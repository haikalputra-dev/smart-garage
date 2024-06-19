<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing()
    {
        return view('front.index');
    }
    
    public function index()
    {
        return view('home');
    }
    
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $user = Auth::user();
            if ($user->role == 'Admin') {
                return redirect()->intended('admin');
            } elseif ($user->role == 'Staff') {
                return redirect()->intended('staff');
            } elseif ($user->role == 'Pengguna') {
                return redirect()->intended('pengguna');
            } else {
                return redirect()->route('login')->with('error', 'Role not recognized');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email or Password is incorrect');
        }
    }
}
