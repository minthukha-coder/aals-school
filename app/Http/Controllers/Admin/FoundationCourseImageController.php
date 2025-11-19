<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FoundationCourseImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; 

class FoundationCourseImageController extends Controller
{
    public function __construct(protected FoundationCourseImage $model) {}

    public function index()
    {
        $foundationCourseImage = $this->model->first();

        if ($foundationCourseImage && $foundationCourseImage->name) {
            $foundationCourseImage->name = asset('storage/images/' . $foundationCourseImage->name);
        }

        return inertia('Admin/FoundationCourseImage/Index', compact('foundationCourseImage'));
    }

    public function edit()
    {
        $foundationCourseImage = $this->model->first();

        if ($foundationCourseImage && $foundationCourseImage->name) {
            $foundationCourseImage->name = asset('storage/images/' . $foundationCourseImage->name);
        }

        return inertia('Admin/FoundationCourseImage/Edit', compact('foundationCourseImage'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $foundationCourseImage = $this->model->first();

        if ($request->file('image')) {
            $uploadImage = $request->file('image');
            $foundationCourseImageName = uniqid() . '_' . time() . '.' . $uploadImage->getClientOriginalExtension();

            try {
                $uploadImage->storeAs('public/images', $foundationCourseImageName);
                Log::info('Position image stored: ' . $foundationCourseImageName);
            } catch (\Exception $e) {
                Log::error('File save error: ' . $e->getMessage());
            }

            if ($foundationCourseImage) {
                if ($foundationCourseImage->name && Storage::exists('public/images/' . $foundationCourseImage->name)) {
                    Storage::delete('public/images/' . $foundationCourseImage->name);
                }

                $foundationCourseImage->update([
                    'name' => $foundationCourseImageName,
                ]);
            } else {
                $this->model->create([
                    'name' => $foundationCourseImageName,
                ]);
            }
        }

        return redirect()->route('admin.foundation-course-images.index')
            ->with('success', 'Foundation course cover updated successfully.');
    }
}
