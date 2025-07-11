<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AdditionalCourse;
use App\Models\CambridgeCourse;
use App\Models\CambridgeExamCourse;
use App\Models\Course;
use App\Models\FoundationCourse;
use App\Models\HomeImage;
use App\Models\InternationalCourse;
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
        $partnership = Partnership::first();

        if ($partnership) {
            $partnership->image1 = asset('storage/images/' . $partnership->image1);
            $partnership->image2 = asset('storage/images/' . $partnership->image2);
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
        return Inertia::render('User/Home', compact('homeImage', 'about', 'courses', 'additionalCourses', 'partnership'));
    }

    //login form
    public function loginForm()
    {
        return Inertia::render('User/Login');
    }

    //login
    public function login(Request $request) {}

    public function foundationCourse()
    {
        $foundationCourses = FoundationCourse::get();
        if ($foundationCourses) {
            foreach ($foundationCourses as $foundationCourse) {
                $foundationCourse->image = asset('storage/images/' . $foundationCourse->image);
            }
        }
        return Inertia::render('User/FoundationCourse', compact('foundationCourses'));
    }

    public function cambridgeCourse()
    {
        $cambridgeCourses = CambridgeCourse::get();
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

    public function internationalCourse()
    {
        $internationalCourses = InternationalCourse::all();
        if ($internationalCourses) {
            foreach ($internationalCourses as $internationalCourse) {
                $internationalCourse->image = asset('storage/images/' . $internationalCourse->image);
            }
        }
        return Inertia::render('User/InternationalCourse', compact('internationalCourses'));
    }

    //about
    public function about()
    {
        $about = About::first();
        if ($about) {
            $about->image = asset('storage/images/' . $about->image);
        }
        return Inertia::render('User/About', compact('about'));
    }

    // gallery
    public function gallery(){
        return Inertia::render('User/Gallery');
    
    }

    //contact
    public function contact()
    {
        return Inertia::render('User/Contact');
    }
}
