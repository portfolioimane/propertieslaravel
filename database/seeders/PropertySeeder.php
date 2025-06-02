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
            'price' => '1,200,000 MAD',
            'image' => 'uploads/img1.jpg',
            'area' => 120,
            'rooms' => 3,
            'bathrooms' => 2,
            'address' => '123 Rue de Fès, Fès',
            'owner_id' => 2,  // مثلا رقم مالك موجود في جدول المستخدمين
            'featured' => true,
        ]);

        Property::create([
            'title' => 'Spacious Villa in Marrakesh',
            'description' => 'Luxurious villa with a large garden...',
            'price' => '3,500,000 MAD',
            'image' => 'uploads/img2.jpg',
            'area' => 250,
            'rooms' => 5,
            'bathrooms' => 4,
            'address' => '456 Avenue des Jardins, Marrakesh',
            'owner_id' => 3,
            'featured' => false,
        ]);
    }
}
