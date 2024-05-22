<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Property;

class AdminPropertyController extends Controller
{
    public function index()
    {
        // Fetch properties with their images
        $properties = Property::all();

        // Pass properties to the view
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $propertyData = $request->only(['name', 'description', 'price', 'location']);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $imagePath = $image->storeAs('images/properties', $imageName, 'public');
            $propertyData['image'] = $imagePath;
        }

        try {
            Property::create($propertyData);
            return redirect()->route('admin.properties.index')->with('success', 'Property created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error creating property: ' . $e->getMessage()]);
        }
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $property = Property::findOrFail($id);
        $propertyData = $request->only(['name', 'description', 'price', 'location']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $imagePath = $image->storeAs('images/properties', $imageName, 'public');
            $propertyData['image'] = $imagePath;
        }

        try {
            $property->update($propertyData);
            return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error updating property: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        
        try {
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }
            $property->delete();
            return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error deleting property: ' . $e->getMessage()]);
        }
    }
}
