<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinarian extends Model
{
    use HasFactory;

    protected $table = 'veterinarians';

    protected $fillable = [
        'name',
        'speciality',
        'twitter_link',
        'facebook_link',
        'instagram_link',
        'photo',
        'description',
    ];
}
