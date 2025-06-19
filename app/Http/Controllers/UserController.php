<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showProfile()
{
    return view('profile', ['user' => Auth::user()]);
}

public function updateProfile(Request $request, $id)
{
    $user = User::findOrFail($id);
    
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phonenumber' => 'nullable|string|max:20',  // Menambahkan validasi untuk nomor telepon
    ]);

    // Update data pengguna
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phonenumber = $request->phonenumber;  // Menyimpan nomor telepon yang diperbarui

    // Jika ada gambar profil yang diunggah
    if ($request->hasFile('profile_picture')) {
        $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $imagePath;
    }

    // Simpan perubahan
    $user->save();

    return redirect()->route('profile')->with('success', 'Profile updated successfully');
}
}