<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        // 'message',
        'plan_id',
        'plan_name',
        'amount',
        'duration',
        'payment_method',
        'features',
        
        'contact_number',
        'pet_name',
        'pet_type',
        'pet_description',
        'pet_photo'
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
