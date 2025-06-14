<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->string('image');
            $table->string('address');
            $table->integer('area');  // area in square meters
            $table->integer('rooms');  // number of rooms
            $table->integer('bathrooms');  // number of bathrooms
            $table->boolean('featured')->default(false);  // New field for featured property
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

