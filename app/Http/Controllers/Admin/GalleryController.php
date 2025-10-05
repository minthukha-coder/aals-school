<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    //
    public function __construct(protected Gallery $gallery) {}

    public function index()
    {
        $galleries = $this->gallery->get();
        foreach($galleries as $gallery) {
            $gallery->image = asset('storage/images/' . $gallery->image);
        }
        return Inertia::render('Admin/Gallery/Index', compact('galleries'));
    }

    //create
    public function create()
    {
        return Inertia::render('Admin/Gallery/Create');
    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $this->gallery->create($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Image uploaded successfully.');
    }

    public function edit(Request $request)
    {
        $gallery = $this->gallery->findOrFail($request->id);
        return Inertia::render('Admin/Gallery/Edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::delete('public/images/' . $gallery->image);
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Image updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete image file from storage if it exists
        if ($gallery->image && Storage::exists('public/images/' . $gallery->image)) {
            Storage::delete('public/images/' . $gallery->image);
        }

        // Delete record from database
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully.');
    }
}
