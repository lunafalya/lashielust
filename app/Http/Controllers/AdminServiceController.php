<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'type' => 'nullable|string|max:100',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('services', 'public');
        }

        Service::create([
            'name' => $request->name,
            'category' => $request->category,
            'type' => $request->type,
            'price' => $request->price,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.services')->with('success', 'Service added successfully!');
    }

        public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika ada file baru diupload
        if ($request->hasFile('photo')) {
            // hapus foto lama (opsional)
            if ($service->file_path && file_exists(storage_path('app/public/' . $service->file_path))) {
                unlink(storage_path('app/public/' . $service->file_path));
            }

            // simpan foto baru
            $path = $request->file('photo')->store('services', 'public');
            $validatedData['file_path'] = $path;
        }

        // update data ke database
        $service->update($validatedData);

        return redirect()->route('admin.services')->with('success', 'Service updated successfully!');
    }


public function destroy($id)
{
    $service = Service::findOrFail($id);

    // Hapus file gambar jika ada
    if ($service->file_path && Storage::disk('public')->exists($service->file_path)) {
        Storage::disk('public')->delete($service->file_path);
    }

    $service->delete();
    return redirect()->route('admin.services')->with('success', 'Service deleted successfully!');
}
}
