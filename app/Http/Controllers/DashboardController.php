<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reminder;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil frequency dari dropdown (default: 'Daily')
        $frequency = $request->input('frequency', 'Daily'); 
        $selectedFrequency = $frequency;
    
        // Filter reminders sesuai frequency
        $remindersQuery = Reminder::orderBy('start_date', 'asc');
        $userId = auth()->guard('web')->user()->id; // Ambil ID user yang sedang login
    
        // Filter berdasar frekuensi
        switch ($frequency) {
            case 'Daily':
                $remindersQuery->whereDate('start_date', now());
                break;
            case 'Weekly':
                $remindersQuery->whereBetween('start_date', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'Monthly':
                $remindersQuery->whereMonth('start_date', now()->month);
                break;
            case 'Yearly':
                $remindersQuery->whereYear('start_date', now()->year);
                break;
        }
    
        // Tambahkan filter berdasarkan user_id
        $remindersQuery->where('user_id', $userId);
    
        // Ambil data reminder sesuai filter
        $reminders = $remindersQuery->get();
    
        // Hitung total unpaid dan reminder berdasarkan frequency
        $unpaidTotal = $reminders->where('status', 'pending')->sum('reminder_amount');
        $totalReminders = $reminders->count();
    
        // Jika user terautentikasi
        if (Auth::check()) {
            return view('dashboard', compact('unpaidTotal', 'reminders', 'frequency', 'totalReminders', 'selectedFrequency'));
        } else {
            return redirect()->route('login');
        }
    }
    
}
