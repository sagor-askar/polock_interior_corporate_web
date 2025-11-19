<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = TeamMember::latest()->get();
        return view('backend.teammembers.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.teammembers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:1048', //Max 1MB
        ]);

        $data = $request->only(['name', 'designation', 'department']);
        $data['status'] = 1;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/team_members'), $filename);
            $data['image'] = $filename;
        }

        TeamMember::create($data);
        return redirect()->route('admin.team.index')->with('success', 'Team Info Added Successfully.');
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
    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('backend.teammembers.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:1048', //Max 1MB
            'status' => 'required|in:0,1',
        ]);

        $data = $request->only(['name', 'designation', 'department', 'status']);

        if($request->hasFile('image')) {
            //delete old image
            $oldImage = public_path('uploads/team_members/' . $member->image);
            if(File::exists($oldImage)){
                File::delete($oldImage);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/team_members'), $filename);
            $data['image'] = $filename;
        }

        $member->update($data);
        return redirect()->route('admin.team.index')->with('success', 'Team Info Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);

        $imagePath = public_path('uploads/team_members/' . $member->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $member->delete();
        return redirect()->route('admin.team.index')->with('success','Tean Info Deleted Successfully.');
    }
}
