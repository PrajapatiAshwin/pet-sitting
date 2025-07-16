<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetManage extends Model
{
    use HasFactory;

    protected $table = 'pet_manages';

    protected $fillable = [
        'pet_name',
    ];
}
