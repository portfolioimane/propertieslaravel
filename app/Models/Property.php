<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'area',
        'rooms',
        'bathrooms',
        'owner_name',
        'owner_phone',
        'owner_email',
        'featured',  // Include featured field
    ];

        public function photoGallery()
    {
        return $this->hasMany(PhotoGallery::class);
    }
}
