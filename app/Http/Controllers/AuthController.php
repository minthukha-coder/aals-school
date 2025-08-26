<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\UserService;
class AuthController extends Controller
{
    //
    public function __construct(protected UserService $userService){

    }

    public function loginPage()
    {
        return Inertia::render('User/Login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $this->userService->login($request);
        if ($data) {
            session(['success' => 'Login success']);
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    }

}
