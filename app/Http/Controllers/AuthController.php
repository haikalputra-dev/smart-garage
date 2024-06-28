<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Carbon::setLocale('id');

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
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
                return redirect()->intended('/admin');
            } elseif ($user->role == 'Staff') {
                return redirect()->intended('/staff');
            } elseif ($user->role == 'Pelanggan') {
                return redirect()->intended('/');
            } else {
                return redirect()->route('login')->with('error', 'Role not recognized');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email or Password is incorrect');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'  => 'Pelanggan'
        ]);
    }

    public function register(Request $request)
    {
        $user = $this->create($request->all());

        Auth::login($user);

        return redirect()->intended('/');
    }

    public function profilPengguna() {
        $user = User::where('id', Auth::user()->id)->where('role', 'Pelanggan')->firstOrFail();
        $rentals = Rental::where('renter_id', Auth::user()->id)->with('garasi')->orderBy('created_at','desc')->get();
        return view('front.profil_pengguna', compact('rentals'));
    }
}
