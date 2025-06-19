<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;



class Logincontroller extends Controller
{
    public function login(Request $request)
{
    // Validate the credentials
    $credentials = $request->validate([
        'name' => 'required',
        'password' => 'required',
    ]);

    // Attempt login
    if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        // Fetch the user ID of the authenticated user
        $userId = Auth::guard('web')->user()->id;

        // Log the user ID for debugging (optional)
        Log::info('User ID after login: ' . $userId);

        // Optionally, you can pass the user ID to the session or redirect with it
        session(['user_id' => $userId]);

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }

    // Return back with errors if login fails
    return back()->withErrors([
        'name' => 'The provided credentials do not match our records.',
    ])->onlyInput('name');
}

    
    public function showForm()
    {
        return view('auth.register'); // Pastikan ada view register
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        // Validasi input pengguna
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // pastikan password_confirmation ada di form
        ]);

        // Buat pengguna baru dengan hash password
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hashing password
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman beranda atau halaman tujuan
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }

    public function logout()
    {
        Auth::logout(); // Logout user
        return redirect('/login'); // Redirect ke halaman login setelah logout
    }
}