<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('home.services', compact('services'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id); // jika tidak ditemukan, 404
        return view('home.detail', compact('service'));
    }  
}
