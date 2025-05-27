<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use Illuminate\Http\Request;

class NomineeController extends Controller
{
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $nominees = Nominee::all();
        return view('nominees.index', compact('nominees'));
    }

    /**
     * Show the form for creating a new resource. */
    public function create()
    {
        return view('nominees.create');
    }

    /**
     * Store a newly created resource in storage. */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/nominees'), $imageName);
            $data['photo'] = 'images/nominees/' . $imageName;
        }

        Nominee::create($data);

        return redirect()->route('nominees.index')->with('success', 'Nominee added successfully.');
    }

    /**
     * Display the specified resource. */
    public function show(Nominee $nominee)
    {
        return view('nominees.show', compact('nominee'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit(Nominee $nominee)
    {
        return view('nominees.edit', compact('nominee'));
    }

    /**
     * Update the specified resource in storage. */
    public function update(Request $request, Nominee $nominee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($nominee->photo && file_exists(public_path($nominee->photo))) {
                unlink(public_path($nominee->photo));
            }

            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/nominees'), $imageName);
            $data['photo'] = 'images/nominees/' . $imageName;
        }

        $nominee->update($data);

        return redirect()->route('nominees.index')->with('success', 'Nominee updated successfully.');
    }

    /**
     * Remove the specified resource from storage. */
    public function destroy(Nominee $nominee)
    {
        // Delete photo if exists
        if ($nominee->photo && file_exists(public_path($nominee->photo))) {
            unlink(public_path($nominee->photo));
        }

        $nominee->delete();
        return redirect()->route('nominees.index')->with('success', 'Nominee deleted successfully.');
    }
}
