<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function index()
    {
        $homeImage = HomeImage::first();

        if ($homeImage) {
            $homeImage->name = asset('storage/images/' . $homeImage->name);
        }
        return inertia('Admin/Home/Index', compact('homeImage'));
    }


    public function edit()
    {
        $homeImage = HomeImage::first();
        if ($homeImage) {
            $homeImage->name = asset('storage/images/' . $homeImage->name);
        }
        return inertia('Admin/Home/Edit', compact('homeImage'));
    }


    public function update(Request $request)
    {
        $homeImage = HomeImage::first();
        if ($request->file('image')) {
            $uploadImage = $request->file('image');
            $homeImageName = uniqid() . '_' . time() . '.' . $uploadImage->getClientOriginalExtension();

            try {
                $path = $uploadImage->storeAs('public/images', $homeImageName);
                Log::info('Image stored at: ' . $path);
            } catch (\Exception $e) {
                Log::error('File save error: ' . $e->getMessage());
            }
            if ($homeImage) {
                Storage::delete('public/images/' . $homeImage->name);
                $homeImage->update([
                    'name' => $homeImageName,
                ]);
            }else{
                HomeImage::create([
                    'name' => $homeImageName,
                ]);
            }
        }


        return redirect()->route('admin.home.index')->with('success', 'Home page updated successfully.');
    }
}
