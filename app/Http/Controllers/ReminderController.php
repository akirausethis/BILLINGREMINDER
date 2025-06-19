<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\User;
use App\Models\Type;
use App\Models\Frequency;
use App\Models\Category;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class ReminderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $reminders = Reminder::with(['type', 'frequency', 'category', 'paymentMethod'])
            ->where('user_id', auth()->guard('web')->user()->id)
            ->when($search, function ($query, $search) {
                return $query->where('reminder_name', 'like', '%' . $search . '%');
            })
            ->orderBy('start_date', 'asc')
            ->paginate(10);
    
        return view('reminders.index', compact('reminders'));
    }

    public function paymentIndex(Request $request)
    {
        $search = $request->input('search');
    
        $reminders = Reminder::with(['type', 'frequency', 'category', 'paymentMethod'])
            ->where('user_id', auth()->guard('web')->user()->id)
            ->when($search, function ($query, $search) {
                $query->where('reminder_name', 'like', "%{$search}%")
                      ->orWhere('status', 'like', "%{$search}%");
            })
            ->orderBy('start_date', 'asc')
            ->paginate(10);
    
        return view('payment.show', compact('reminders'));
    }    

    public function historyIndex(Request $request)
    {
        $search = $request->input('search');
    
        // Retrieve only completed reminders
        $reminders = Reminder::with(['type', 'frequency', 'category', 'paymentMethod'])
            ->where('user_id', auth()->guard('web')->user()->id)
            ->where('status', 'completed') // Add filter for completed status
            ->when($search, function ($query, $search) {
                $query->where('reminder_name', 'like', "%{$search}%")
                      ->orWhere('status', 'like', "%{$search}%");
            })
            ->orderBy('start_date', 'asc')
            ->paginate(10);
    
        return view('history', compact('reminders'));
    }
    
    
    public function create(Request $request)
{
    // Retrieve the user_id from the query parameter if provided or default to the authenticated user's ID
    $userId = $request->query('user_id', auth()->guard('web')->check() ? auth()->guard('web')->user()->id : null);


    // Fetch necessary data for the form
    $types = Type::all();
    $frequencies = Frequency::all();
    $categories = Category::all();
    $payment_methods = PaymentMethod::all();

    // Return the view with the necessary data including user_id
    return view('reminders.create', compact('userId', 'types', 'frequencies', 'categories', 'payment_methods'));
}

    public function store(Request $request)
    {

        $userId = $request->query('userId');
        // Validate incoming request
        $validated = $request->validate([
            'reminder_name' => 'required|string|max:255',
            'reminder_desc' => 'required|string',
            'type_id' => 'required|exists:types,id',
            'frequency_id' => 'required|exists:frequencies,id',
            'category_id' => 'nullable|exists:categories,id',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'reminder_amount' => 'nullable|numeric|min:0',
            'start_date' => 'required|date|after_or_equal:today',
            'status' => 'nullable|string|in:pending,completed',
        ]);
    
        // Ensure the user is authenticated
        if (auth()->guard('web')->check()) {
            $validateUser = auth()->guard('web')->user()->id;
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to create a reminder.');
        }
    
        // Set default status if not provided
        $validated['status'] = $validated['status'] ?? 'pending'; 
    
        // Log the user ID for debugging (optional)
        Log::info('Authenticated user ID: ' . $validateUser);
    
        // Create the reminder
        Reminder::create([
            'reminder_name' => $validated['reminder_name'],
            'reminder_desc' => $validated['reminder_desc'],
            'type_id' => $validated['type_id'],
            'frequency_id' => $validated['frequency_id'],
            'category_id' => $validated['category_id'],
            'payment_method_id' => $validated['payment_method_id'],
            'reminder_amount' => $validated['reminder_amount'],
            'start_date' => $validated['start_date'],
            'status' => $validated['status'],
            'user_id' => $userId,
            'total_paid' => 0,
        ]);
    
        // Redirect back with success message
        return redirect()->route('reminders.index')->with('success', 'Reminder created successfully.');
    }
    

    public function edit(Reminder $reminder)
    {
        return view('reminders.edit', [
            'reminder' => $reminder,
            'types' => Type::all(),
            'frequencies' => Frequency::all(),
            'categories' => Category::all(),
            'payment_methods' => PaymentMethod::all(),
        ]);
    }

    public function update(Request $request, Reminder $reminder)
    {
        $validated = $request->validate([
            'reminder_name' => 'required|string|max:255',
            'reminder_desc' => 'required|string',
            'type_id' => 'required|exists:types,id',
            'frequency_id' => 'required|exists:frequencies,id',
            'category_id' => 'nullable|exists:categories,id',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'reminder_amount' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'status' => 'nullable|string|in:pending,completed',
        ]);
    
        if (!$validated['type_id']) {
            return redirect()->back()->withErrors(['type_id' => 'Please select a valid type']);
        }
        if (!$validated['frequency_id']) {
            return redirect()->back()->withErrors(['frequency_id' => 'Please select a valid frequency']);
        }
    
        $reminder->update($validated);
    
        return redirect()->route('reminders.index')->with('success', 'Reminder updated successfully.');
    }

    public function destroy(Reminder $reminder)
    {
        $reminder->delete();

        return redirect()->route('reminders.index')->with('success', 'Reminder deleted successfully.');
    }
}
