<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        Property::create([
            'title' => 'Modern Apartment in Fès',
            'description' => '2nd floor, sunny, well located...',
            'price' => '1,200,000',
            'image' => 'uploads/img1.jpg',
            'area' => 120,
            'rooms' => 3,
            'bathrooms' => 2,
            'address' => '123 Rue de Fès, Fès',
            'city' => 'Fès',
            'type' => 'apartment',     // new field: type
            'offer_type' => 'sale',    // new field: offer_type
            'owner_id' => 2,  // مثلا رقم مالك موجود في جدول المستخدمين
            'featured' => true,
        ]);

        Property::create([
            'title' => 'Spacious Villa in Marrakesh',
            'description' => 'Luxurious villa with a large garden...',
            'price' => '3,500,000',
            'image' => 'uploads/img2.jpg',
            'area' => 250,
            'rooms' => 5,
            'bathrooms' => 4,
            'address' => '456 Avenue des Jardins, Marrakesh',
            'city' => 'Marrakesh',
            'type' => 'villa',         // new field: type
            'offer_type' => 'rent',    // new field: offer_type
            'owner_id' => 3,
            'featured' => false,
        ]);
    }
}
