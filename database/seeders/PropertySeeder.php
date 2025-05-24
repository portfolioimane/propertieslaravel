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
            'owner_name' => 'Mr. Youssef',
            'owner_phone' => '06 12 34 56 78',
            'owner_email' => null,
            'featured' => true,  // This property is featured
        ]);

        Property::create([
            'title' => 'Spacious Villa in Marrakesh',
            'description' => 'Luxurious villa with a large garden...',
            'price' => '3,500,000 MAD',
            'image' => 'uploads/img2.jpg',
            'area' => 250,
            'rooms' => 5,
            'bathrooms' => 4,
            'owner_name' => 'Mrs. Amina',
            'owner_phone' => '06 23 45 67 89',
            'owner_email' => 'amina@example.com',
            'featured' => false,  // This property is not featured
        ]);
    }
}
