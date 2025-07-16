<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryManagement extends Model
{
    use HasFactory;

    protected $table = 'gallery_management';

    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
