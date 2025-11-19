<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectTypes = ProjectType::get();
        return view('backend.project_type.index', compact('projectTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.project_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        ProjectType::create($request->all());
        return redirect()->route('admin.project-types.index')->with('success','Project type Created Successfully.');
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
    public function edit(ProjectType $projectType)
    {
        return view('backend.project_type.edit', compact('projectType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectType $projectType)
    {
         $request->validate([
            'name' => 'required|string|max:255',
        ]);
         $projectType->update($request->all());
        return redirect()->route('admin.project-types.index')->with('success','Project type Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectType $projectType)
    {
         $projectType->delete();
        return redirect()->route('admin.project-types.index')->with('success', 'Project-type Deleted Successfully.');
    }
}
