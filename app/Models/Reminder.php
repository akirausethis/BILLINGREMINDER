<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'reminder_name',
        'reminder_desc',
        'type_id',
        'frequency_id',
        'category_id',
        'payment_method_id',
        'reminder_amount',
        'start_date', 
        'status',
        'total_paid',
        'user_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function frequency()
    {
        return $this->belongsTo(Frequency::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    
    // Menambahkan accessor untuk mendapatkan nama lengkap type, frequency, dll
    public function getTypeNameAttribute()
    {
        return $this->type ? $this->type->type_name : 'No type selected';
    }
    
    public function getFrequencyNameAttribute()
    {
        return $this->frequency ? $this->frequency->frequency_name : 'No frequency selected';
    }
    
    public function getCategoryNameAttribute()
    {
        return $this->category ? $this->category->category_type : 'No category selected';
    }
    
    public function getPaymentMethodNameAttribute()
    {
        return $this->paymentMethod ? $this->paymentMethod->name : 'No payment method selected';
    }

    public function getStatusLabelAttribute()
    {
        return ucfirst($this->status);
    }
}
