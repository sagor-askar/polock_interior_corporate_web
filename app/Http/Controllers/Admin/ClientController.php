<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('backend.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:300',
            'description' => 'nullable|string',
            'project_location' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        $data = $request->only(['name', 'description', 'project_location', 'status']);

        // handle image upload
        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/clients'), $imageName);
            $data['image'] = 'uploads/clients/' . $imageName;
        }

        Client::create($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client Info Added Successfully.');
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
    public function edit(Client $client)
    {
        return view('backend.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:300',
            'description' => 'nullable|string',
            'project_location' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['name', 'description', 'project_location', 'status']);

        // handle image update
        if($request->hasFile('image')){
            if($client->image && file_exists(public_path($client->image))){
                unlink(public_path($client->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/clients'), $imageName);
            $data['image'] = 'uploads/clients/' . $imageName;
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if ($client->image && file_exists(public_path($client->image))) {
            unlink(public_path($client->image));
        }

        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client Info Deleted Successfully.');
    }
}
