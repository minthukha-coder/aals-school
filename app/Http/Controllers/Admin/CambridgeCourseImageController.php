<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CambridgeCourseImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; 

class CambridgeCourseImageController extends Controller
{
    public function __construct(protected CambridgeCourseImage $model) {}

    public function index()
    {
        $cambridgeCourseImage = $this->model->first();

        if ($cambridgeCourseImage && $cambridgeCourseImage->name) {
            $cambridgeCourseImage->name = asset('storage/images/' . $cambridgeCourseImage->name);
        }

        return inertia('Admin/CambridgeCourseImage/Index', compact('cambridgeCourseImage'));
    }

    public function edit()
    {
        $cambridgeCourseImage = $this->model->first();

        if ($cambridgeCourseImage && $cambridgeCourseImage->name) {
            $cambridgeCourseImage->name = asset('storage/images/' . $cambridgeCourseImage->name);
        }

        return inertia('Admin/CambridgeCourseImage/Edit', compact('cambridgeCourseImage'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $cambridgeCourseImage = $this->model->first();

        if ($request->file('image')) {
            $uploadImage = $request->file('image');
            $cambridgeCourseImageName = uniqid() . '_' . time() . '.' . $uploadImage->getClientOriginalExtension();

            try {
                $uploadImage->storeAs('public/images', $cambridgeCourseImageName);
                Log::info('Position image stored: ' . $cambridgeCourseImageName);
            } catch (\Exception $e) {
                Log::error('File save error: ' . $e->getMessage());
            }

            if ($cambridgeCourseImage) {
                if ($cambridgeCourseImage->name && Storage::exists('public/images/' . $cambridgeCourseImage->name)) {
                    Storage::delete('public/images/' . $cambridgeCourseImage->name);
                }

                $cambridgeCourseImage->update([
                    'name' => $cambridgeCourseImageName,
                ]);
            } else {
                $this->model->create([
                    'name' => $cambridgeCourseImageName,
                ]);
            }
        }

        return redirect()->route('admin.cambridge-course-images.index')
            ->with('success', 'Cambridge Course cover updated successfully.');
    }
}
