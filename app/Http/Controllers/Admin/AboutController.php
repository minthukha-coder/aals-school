<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    //
    public function index()
    {
        $about = About::first();
        if ($about) {
            $about->image = asset('storage/images/' . $about->image);
        }
        return inertia('Admin/About/Index', compact('about'));
    }
    public function edit()
    {
        $about = About::first();
        if ($about) {
            $about->name = asset('storage/images/' . $about->name);
        }
        return inertia('Admin/About/Edit', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,avif|max:2048',
        ]);

        $about = About::first();
        if (!$about) {
            About::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
        if ($request->file('image')) {
            $uploadImage = $request->file('image');
            $aboutImageName = uniqid() . '_' . time() . '.' . $uploadImage->getClientOriginalExtension();
            $uploadImage->storeAs('public/images', $aboutImageName);

            if ($about->image) {
                Storage::delete('public/images/' . $about->image);
            }
            $about->image = $aboutImageName;
            $about->save();
        }
        return redirect()->route('admin.about.index')->with('success', 'About information updated successfully.');
    }
}
