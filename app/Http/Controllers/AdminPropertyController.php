<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Property;


class AdminPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'location' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // adjust file types and size as needed
        ]);
    
        $propertyData = $request->only(['name', 'description', 'price', 'location']);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Get the original file name
            $imagePath = $image->storeAs('images/properties', $imageName, 'public');
            $propertyData['image'] = $imagePath;
        }
    
        Property::create($propertyData);
    
        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully.');
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.properties.edit', compact('property'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'location' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // adjust file types and size as needed
    ]);

    $property = Property::findOrFail($id);
    $propertyData = $request->only(['name', 'description', 'price', 'location']);

    if ($request->hasFile('image')) {
        // Delete old image if exists
        Storage::delete($property->image);

        $imagePath = $request->file('image')->store('images/properties');
        $propertyData['image'] = $imagePath;
    }

    $property->update($propertyData);

    return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('admin.properties.index')
                         ->with('success', 'Property deleted successfully.');
    }
}   