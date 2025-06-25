<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AdditionalCourse;
use App\Models\CambridgeCourse;
use App\Models\CambridgeExamCourse;
use App\Models\Course;
use App\Models\FoundationCourse;
use App\Models\HomeImage;
use App\Models\Partnership;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home()
    {
        $homeImage = HomeImage::first();
        $courses = Course::all();
        $about = About::first();
        $additionalCourses = AdditionalCourse::all();
        $partnershipImages = Partnership::all();
        if($partnershipImages){
            foreach($partnershipImages as $partnershipImage) {
                $partnershipImage->image = asset('storage/images/' . $partnershipImage->image);
            }
        }
        if ($additionalCourses) {
            foreach ($additionalCourses as $additionalCourse) {
                $additionalCourse->image = asset('storage/images/' . $additionalCourse->image);
            }
        }
        if ($homeImage) {
            $homeImage->name = asset('storage/images/' . $homeImage->name);
        }
        if ($about) {
            $about->image = asset('storage/images/' . $about->image);
        }

        if ($courses) {
            foreach ($courses as $course) {
                $course->image = asset('storage/images/' . $course->image);
            }
        }
        return Inertia::render('User/Home', compact('homeImage', 'about', 'courses', 'additionalCourses', 'partnershipImages'));
    }

    public function foundationCourse()
    {
        $foundationCourses = FoundationCourse::all();
        if ($foundationCourses) {
            foreach ($foundationCourses as $foundationCourse) {
                $foundationCourse->image = asset('storage/images/' . $foundationCourse->image);
            }
        }
        return Inertia::render('User/FoundationCourse', compact('foundationCourses'));
    }

    public function cambridgeCourse()
    {
        $cambridgeCourses = CambridgeCourse::all();
        if ($cambridgeCourses) {
            foreach ($cambridgeCourses as $cambridgeCourse) {
                $cambridgeCourse->image = asset('storage/images/' . $cambridgeCourse->image);
            }
        }
        return Inertia::render('User/CambridgeCourse', compact('cambridgeCourses'));
    }

    public function additionalCourse()
    {
        $additionalCourses = AdditionalCourse::all();
        if ($additionalCourses) {
            foreach ($additionalCourses as $additionalCourse) {
                $additionalCourse->image = asset('storage/images/' . $additionalCourse->image);
            }
        }
        return Inertia::render('User/AdditionalCourse', compact('additionalCourses'));
    }

    public function cambridgeExamCourse()
    {
        $cambridgeExamCourses = CambridgeExamCourse::all();
        if ($cambridgeExamCourses) {
            foreach ($cambridgeExamCourses as $cambridgeExamCourse) {
                $cambridgeExamCourse->image = asset('storage/images/' . $cambridgeExamCourse->image);
            }
        }
        return Inertia::render('User/CambridgeExamCourse', compact('cambridgeExamCourses'));
    }

    //about
    public function about()
    {
        return Inertia::render('User/About');
    }

    //contact
    public function contact()
    {
        return Inertia::render('User/Contact');
    }
}
