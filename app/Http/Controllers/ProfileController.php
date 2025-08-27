<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use App\Services\UserService;

class ProfileController extends Controller
{
    public function __construct(protected UserService $userService){

    }

    // Show profile page
//    public function profile()
// {
//     if (!auth()->check()) {
//         return redirect()->route('login');
//     }

//     return Inertia::render('User/Profile', [
//         'user' => auth()->user(),
//     ]);
// }

    // Love You 

    public function profile()
    {
        return Inertia::render('User/Profile', [
            'user' => auth()->user()
        ]);
    }


    // Update profile
    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:6|confirmed', // requires password_confirmation field
        ]);

        $user = auth()->user();
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }
}
