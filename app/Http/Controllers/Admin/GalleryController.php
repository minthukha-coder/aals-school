<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    //
    public function __construct(protected Gallery $gallery) {}

    public function index()
    {
        $galleries = $this->gallery->get();
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

        return redirect()->route('admin.gallery.index')->with('success', 'Image uploaded successfully.');
    }

    public function edit(Request $request)
    {
        $gallery = $this->gallery->findOrFail($request->id);
        return Inertia::render('Admin/Gallery/Edit', compact('gallery'));
    }   
}
