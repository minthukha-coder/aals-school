<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdditionalCourseImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; 

class AdditionalCourseImageController extends Controller
{
    public function __construct(protected AdditionalCourseImage $model) {}

    public function index()
    {
        $additionalCourseImage = $this->model->first();

        if ($additionalCourseImage && $additionalCourseImage->name) {
            $additionalCourseImage->name = asset('storage/images/' . $additionalCourseImage->name);
        }

        return inertia('Admin/AdditionalCourseImage/Index', compact('additionalCourseImage'));
    }

    public function edit()
    {
        $additionalCourseImage = $this->model->first();

        if ($additionalCourseImage && $additionalCourseImage->name) {
            $additionalCourseImage->name = asset('storage/images/' . $additionalCourseImage->name);
        }

        return inertia('Admin/AdditionalCourseImage/Edit', compact('additionalCourseImage'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $additionalCourseImage = $this->model->first();

        if ($request->file('image')) {
            $uploadImage = $request->file('image');
            $additionalCourseImageName = uniqid() . '_' . time() . '.' . $uploadImage->getClientOriginalExtension();

            try {
                $uploadImage->storeAs('public/images', $additionalCourseImageName);
                Log::info('Position image stored: ' . $additionalCourseImageName);
            } catch (\Exception $e) {
                Log::error('File save error: ' . $e->getMessage());
            }

            if ($additionalCourseImage) {
                if ($additionalCourseImage->name && Storage::exists('public/images/' . $additionalCourseImage->name)) {
                    Storage::delete('public/images/' . $additionalCourseImage->name);
                }

                $additionalCourseImage->update([
                    'name' => $additionalCourseImageName,
                ]);
            } else {
                $this->model->create([
                    'name' => $additionalCourseImageName,
                ]);
            }
        }

        return redirect()->route('admin.additional-course-images.index')
            ->with('success', 'Additional Course cover updated successfully.');
    }
}
