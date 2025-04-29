<?php
// app/Http/Controllers/PropertyController.php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        // Fetch all properties from the database
        $properties = Property::all();

        // Return as JSON response
        return response()->json($properties);
    }
}
