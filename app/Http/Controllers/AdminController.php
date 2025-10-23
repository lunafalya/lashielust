<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ambil data admin login
        return view('admin.dashboard', compact('user'));
    }
}
