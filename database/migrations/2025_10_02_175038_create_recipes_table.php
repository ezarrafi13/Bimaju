<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Judul resep
            $table->string('category');       // Kategori (Dessert, Snack, dsb)
            $table->string('image')->nullable(); // Path gambar
            $table->text('desc');             // Deskripsi singkat
            $table->string('time');           // Estimasi waktu (contoh: 30 menit)
            $table->string('serving');        // Porsi (contoh: 3 porsi)
            $table->decimal('rating', 2, 1)->default(0); // Rating, misal 4.9
            $table->decimal('price', total: 10, places: 1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
