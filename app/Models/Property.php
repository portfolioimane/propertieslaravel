<?php

// app/Models/Property.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'title', 'description', 'price', 'image'
    ];

    // If you want to customize the table name (optional)
    protected $table = 'properties';
}
