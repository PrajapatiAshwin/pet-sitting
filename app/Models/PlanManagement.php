<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanManagement extends Model
{
    use HasFactory;

    protected $table = 'plan_management';

    protected $fillable = [
        'image',
        'plan_name',
        'amount',
        'duration_value',
        'duration_unit',
        'plan_features',
    ];
}
