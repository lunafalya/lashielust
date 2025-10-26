<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\SuperUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
{
    return view('home.register');
}
    public function register(Request $request)
    {
        try {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required',
        'password' => 'required|min:6',
        'profile_photo' => 'nullable|image|mimes:png,jpg,jpeg'
    ]);

    $profilePath = null;
    if ($request->hasFile('profile_photo')) {
        $profilePath = $request->file('profile_photo')->store('profiles', 'public');
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => bcrypt($request->password),
        'profile_photo' => $profilePath
    ]);

        return redirect()->route('register')->with('success', 'Registration successful! Please login.');
    } catch (\Exception $e) { 
        return redirect()->route('register')->with('error', 'Registration failed, please try again.');
    }
}



public function showLoginForm()
{
    return view('home.login');
}

public function loginProcess(Request $request)
{
 $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
    }

    if ($user->role === 'user') {
        return redirect()->route('landing')->with('success', 'Login successful!');
    }

    // Jika ada role lain
    Auth::logout();
    return redirect()->route('login')->with('error', 'Unauthorized access!');
}

    return back()->with('error', 'Incorrect email or password!');
}


    public function logout(Request $request)
{
    Auth::logout(); 
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'You have been logged out!');
}

}