<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'title',
        'description',
        'price',
        'image',
        'address',
        'area',
        'rooms',
        'bathrooms',
        'featured',
    ];

    /**
     * Get the user who owns the property.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the photo gallery associated with the property.
     */
    public function photoGallery()
    {
        return $this->hasMany(PhotoGallery::class);
    }
}
