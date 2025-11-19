<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\IgcseCourseImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; 

class IgcseCourseImageController extends Controller
{
    public function __construct(protected IgcseCourseImage $model) {}

    public function index()
    {
        $igcseCourseImage = $this->model->first();

        if ($igcseCourseImage && $igcseCourseImage->name) {
            $igcseCourseImage->name = asset('storage/images/' . $igcseCourseImage->name);
        }

        return inertia('Admin/IgcseCourseImage/Index', compact('igcseCourseImage'));
    }

    public function edit()
    {
        $igcseCourseImage = $this->model->first();

        if ($igcseCourseImage && $igcseCourseImage->name) {
            $igcseCourseImage->name = asset('storage/images/' . $igcseCourseImage->name);
        }

        return inertia('Admin/IgcseCourseImage/Edit', compact('igcseCourseImage'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $igcseCourseImage = $this->model->first();

        if ($request->file('image')) {
            $uploadImage = $request->file('image');
            $igcseCourseImageName = uniqid() . '_' . time() . '.' . $uploadImage->getClientOriginalExtension();

            try {
                $uploadImage->storeAs('public/images', $igcseCourseImageName);
                Log::info('Position image stored: ' . $igcseCourseImageName);
            } catch (\Exception $e) {
                Log::error('File save error: ' . $e->getMessage());
            }

            if ($igcseCourseImage) {
                if ($igcseCourseImage->name && Storage::exists('public/images/' . $igcseCourseImage->name)) {
                    Storage::delete('public/images/' . $igcseCourseImage->name);
                }

                $igcseCourseImage->update([
                    'name' => $igcseCourseImageName,
                ]);
            } else {
                $this->model->create([
                    'name' => $igcseCourseImageName,
                ]);
            }
        }

        return redirect()->route('admin.igcse-course-images.index')
            ->with('success', 'IGCSE Course cover updated successfully.');
    }
}
