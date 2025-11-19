<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Milestone;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $milestones = Milestone::get();
        return view('backend.milestone.index', compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.milestone.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'counts' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);
        Milestone::create($request->all());
        return redirect()->route('admin.milestones.index')->with('success','Milestone Created Successfully.');
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
    public function edit(Milestone $milestone)
    {
        return view('backend.milestone.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'counts' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);
        $milestone->update($request->all());
        return redirect()->route('admin.milestones.index')->with('success','Milestone Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();
        return redirect()->route('admin.milestones.index')->with('success', 'Milestone Deleted Successfully.');
    }
}
