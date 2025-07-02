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
        if (isset($data['message'])) {
            session(['failed' => $data['message']]);
            return redirect()->back();
        }

        session(['success' => 'Login success']);
        if ($data['user']['role'] === 'admin') {
            session(['success' => 'Login success']);
            return redirect()->route('dashboard');
        }
        return redirect()->route('home');
    }

}
