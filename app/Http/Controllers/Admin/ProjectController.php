<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Project;
use App\Models\ProjectImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\Facades\Image;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        return view('backend.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projectTypes = ProjectType::where('status',1)->get();
       return view('backend.project.create', compact('projectTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                => 'required|string|max:255',
            'project_type_id'     => 'required',
            'client_name'         => 'required|string|max:255',
            'location'            => 'required|string|max:255',
            'site_area'           => 'required|string|max:255',
            'date_of_completion'  => 'required|date',
            'stage'               => 'required|in:0,1',
            'description'         => 'nullable|string',
            'image_one'           => 'required|image|mimes:jpeg,png,jpg,gif',
            'image_two'           => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'facebook_url'        => 'nullable|url',
            'youtube_url'         => 'nullable|url',
            'linkedin_url'        => 'nullable|url',
            'visibility_order'    => 'nullable|integer',
            'homepage_visibility' => 'required|in:0,1',
            'status'              => 'required|in:0,1',
        ]);

        $data = $request->except(['image_one', 'image_two']);
        $project = Project::create($data);

        $folder = 'uploads/project/';
        if (!is_dir(public_path($folder))) mkdir(public_path($folder), 0777, true);

        // Image One
        if ($request->hasFile('image_one')) {
            $project->image_one = $this->compressAndUpload($request->file('image_one'), $folder);
        }

        // Image Two
        if ($request->hasFile('image_two')) {
            $project->image_two = $this->compressAndUpload($request->file('image_two'), $folder);
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }


    /**
     * Compress any image to max 500KB using GD + Intervention Image
     */
    private function compressAndUpload($file, $folder)
    {
        $ext = strtolower($file->getClientOriginalExtension());
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $ext;
        $savePath = public_path($folder . $name);

        if (!is_dir(public_path($folder))) {
            mkdir(public_path($folder), 0777, true);
        }

        // Make image with Intervention
        $img = Image::make($file->getRealPath());

        // Resize if too large (prevent upsize)
        $maxWidth = 2000;
        if ($img->width() > $maxWidth) {
            $img->resize($maxWidth, null, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
        }

        // Compression Loop (NEVER increases file size)
        $quality = 90;
        do {
            // Encode based on extension
            if (in_array($ext, ['jpg', 'jpeg'])) {
                $compressed = $img->encode('jpg', $quality);
            } elseif ($ext === 'png') {
                // PNG: convert to JPG for smaller size
                $ext = "jpg";
                $name = str_replace('.png', '.jpg', $name);
                $savePath = public_path($folder . $name);
                $compressed = $img->encode('jpg', $quality);
            } else {
                // Other formats direct save
                $file->move(public_path($folder), $name);
                return $folder . $name;
            }

            file_put_contents($savePath, $compressed);

            $fileSizeKB = filesize($savePath) / 1024;
            $quality -= 5;

        } while ($fileSizeKB > 500 && $quality > 10);

        return $folder . $name;
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('backend.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $projectTypes = ProjectType::where('status',1)->get();
        return view('backend.project.edit', compact('projectTypes','project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'name'                => 'required|string|max:255',
            'project_type_id'     => 'required',
            'client_name'         => 'required|string|max:255',
            'location'            => 'required|string|max:255',
            'site_area'           => 'required|string|max:255',
            'date_of_completion'  => 'required|date',
            'stage'               => 'required|in:0,1',
            'description'         => 'nullable|string',
            'image_one'           => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'image_two'           => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'facebook_url'        => 'nullable|url',
            'youtube_url'         => 'nullable|url',
            'linkedin_url'        => 'nullable|url',
            'visibility_order'    => 'nullable|integer',
            'homepage_visibility' => 'required|in:0,1',
            'status'              => 'required|in:0,1',
        ]);
        $data = $request->except(['image_one', 'image_two']);
        $project->update($data);
        $folder = 'uploads/project/';

        if (!is_dir(public_path($folder))) {
            mkdir(public_path($folder), 0777, true);
        }
        if ($request->hasFile('image_one')) {
            if ($project->image_one && file_exists(public_path($project->image_one))) {
                unlink(public_path($project->image_one));
            }
            $project->image_one = $this->compressAndUpload($request->file('image_one'), $folder);
        }

        if ($request->hasFile('image_two')) {
            if ($project->image_two && file_exists(public_path($project->image_two))) {
                unlink(public_path($project->image_two));
            }
            $project->image_two = $this->compressAndUpload($request->file('image_two'), $folder);
        }

        $project->save();
        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image_one && file_exists(public_path($project->image_one))) {
            unlink(public_path($project->image_one));
        }
        if ($project->image_two && file_exists(public_path($project->image_two))) {
            unlink(public_path($project->image_two));
        }
        foreach ($project->projectImage as $img) {
            if ($img->image && file_exists(public_path($img->image))) {
                unlink(public_path($img->image));
            }
            $img->delete();
        }
        $project->delete();
        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }



    public function uploadImage($id)
    {
        $project = Project::with('projectImage')->where('id',$id)->first();
        return view('backend.project.upload',compact('project'));
    }

    public function uploadImageStore(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $uploadedImages = [];
        $project = Project::findOrFail($id);
        $folder = 'uploads/project/';

        if (!is_dir(public_path($folder))) {
            mkdir(public_path($folder), 0777, true);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Use compressAndUpload method for each image
                $imagePath = $this->compressAndUpload($image, $folder);

                // Save to ProjectImage table
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image'      => $imagePath,
                ]);

                $uploadedImages[] = $imagePath;
            }
        }

        return back()
            ->with('success', 'Images uploaded successfully!')
            ->with('images', $uploadedImages);
    }

    public function projectImageDelete($projectId, $imageId)
    {
        $image = ProjectImage::findOrFail($imageId);

        $imagePath = public_path($image->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image->delete();

        return back()->with('success', 'Image deleted successfully!');
    }
}
