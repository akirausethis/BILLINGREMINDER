<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show()
    {
        // Retrieve all reminders from the database
        $reminders = Reminder::all();
        
        return view('payment.show', compact('reminders'));
    }    

    public function pay(Request $request, $id)
    {
        // Retrieve reminder data based on the ID
        $reminder = Reminder::findOrFail($id);
    
        // Validate the payment amount
        $request->validate([
            'payment_amount' => 'required|numeric|min:0',
        ]);
    
        // Update the total paid amount
        $reminder->total_paid += $request->payment_amount;
    
        // Calculate remaining amount after payment
        $remainingAmount = $reminder->reminder_amount - $reminder->total_paid;
    
        // Update the reminder's amount and status
        if ($remainingAmount <= 0) {
            $reminder->reminder_amount = 0;
            $reminder->status = 'completed'; // Mark as completed when fully paid
        } else {
            $reminder->reminder_amount = $remainingAmount;
        }
    
        // Save the updated reminder
        $reminder->save();
    
        // Redirect to the reminders index with a success message
        return redirect()->route('reminders.index')->with('success', 'Payment successfully processed!');
    }
}
