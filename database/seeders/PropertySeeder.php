<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    public function run()
    {
        DB::table('properties')->insert([
            [
                'title' => 'Luxury Apartment in Downtown',
                'description' => 'A luxurious 3-bedroom apartment located in the heart of the city.',
                'price' => '2000000 MAD',
                'image' => 'https://via.placeholder.com/150',
            ],
            [
                'title' => 'Cozy House Near the Beach',
                'description' => 'A beautiful 2-bedroom house just a few steps away from the beach.',
                'price' => '1200000 MAD',
                'image' => 'https://via.placeholder.com/150',
            ],
            [
                'title' => 'Modern Office Space',
                'description' => 'A spacious office located in a modern building with all the necessary amenities.',
                'price' => '800000 MAD',
                'image' => 'https://via.placeholder.com/150',
            ],
            [
                'title' => 'Country Villa with Pool',
                'description' => 'A beautiful 4-bedroom villa located in a serene countryside with a private pool.',
                'price' => '2500000 MAD',
                'image' => 'https://via.placeholder.com/150',
            ],
            [
                'title' => 'Studio Apartment for Rent',
                'description' => 'A small yet cozy studio apartment perfect for single tenants or couples.',
                'price' => '500000 MAD',
                'image' => 'https://via.placeholder.com/150',
            ],
        ]);
    }
}
