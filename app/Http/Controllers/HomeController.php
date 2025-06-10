<?php

namespace App\Http\Controllers;

use App\Models\HomeImage;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home(){
        $homeImage = HomeImage::first();
        if($homeImage) {
            $homeImage->name = asset('storage/images/' . $homeImage->name);
        }
        return Inertia::render('User/Home', compact('homeImage'));
    }

    public function foundationCourse(){
        return Inertia::render('User/FoundationCourse');
    }

    public function cambridgeCourse(){
        return Inertia::render('User/CambridgeCourse');
    }

    public function additionalCourse(){
        return Inertia::render('User/AdditionalCourse');
    }

    public function cambridgeExamCourse(){
        return Inertia::render('User/CambridgeExamCourse');
    }

    //about
    public function about(){
        return Inertia::render('User/About');
    }

    //contact
    public function contact(){
        return Inertia::render('User/Contact');
    }
}
