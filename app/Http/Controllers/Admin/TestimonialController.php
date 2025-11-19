<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string',
            'speech' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        $data = $request->only(['name', 'designation', 'speech', 'status']);

        // handle image upload
        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/testimonials'), $imageName);
            $data['image'] = 'uploads/testimonials/' . $imageName;
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial Info Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string',
            'speech' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
        ]);
        $data = $request->only(['name', 'designation', 'speech', 'status']);

        // handle image update
        if($request->hasFile('image')){
            if($testimonial->image && file_exists(public_path($testimonial->image))){
                unlink(public_path($testimonial->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/testimonials'), $imageName);
            $data['image'] = 'uploads/testimonials/' . $imageName;
        }
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonials Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image && file_exists(public_path($testimonial->image))) {
            unlink(public_path($testimonial->image));
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonials Info Deleted Successfully.');
    }
}
