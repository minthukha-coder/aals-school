<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InternationalCourseImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; 

class InternationalCourseImageController extends Controller
{
    public function __construct(protected InternationalCourseImage $model) {}

    public function index()
    {
        $internationalCourseImage = $this->model->first();

        if ($internationalCourseImage && $internationalCourseImage->name) {
            $internationalCourseImage->name = asset('storage/images/' . $internationalCourseImage->name);
        }

        return inertia('Admin/InternationalCourseImage/Index', compact('internationalCourseImage'));
    }

    public function edit()
    {
        $internationalCourseImage = $this->model->first();

        if ($internationalCourseImage && $internationalCourseImage->name) {
            $internationalCourseImage->name = asset('storage/images/' . $internationalCourseImage->name);
        }

        return inertia('Admin/InternationalCourseImage/Edit', compact('internationalCourseImage'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $internationalCourseImage = $this->model->first();

        if ($request->file('image')) {
            $uploadImage = $request->file('image');
            $internationalCourseImageName = uniqid() . '_' . time() . '.' . $uploadImage->getClientOriginalExtension();

            try {
                $uploadImage->storeAs('public/images', $internationalCourseImageName);
                Log::info('Position image stored: ' . $internationalCourseImageName);
            } catch (\Exception $e) {
                Log::error('File save error: ' . $e->getMessage());
            }

            if ($internationalCourseImage) {
                if ($internationalCourseImage->name && Storage::exists('public/images/' . $internationalCourseImage->name)) {
                    Storage::delete('public/images/' . $internationalCourseImage->name);
                }

                $internationalCourseImage->update([
                    'name' => $internationalCourseImageName,
                ]);
            } else {
                $this->model->create([
                    'name' => $internationalCourseImageName,
                ]);
            }
        }

        return redirect()->route('admin.international-course-images.index')
            ->with('success', 'International Course cover updated successfully.');
    }
}
