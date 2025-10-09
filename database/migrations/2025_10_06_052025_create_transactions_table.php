<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // Hubungkan ke user yang melakukan transaksi
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Jenis transaksi: Income / Expense
            $table->enum('type', ['Income', 'Expense']);

            // Deskripsi singkat (misal: Beli Resep Brownies)
            $table->string('desc');

            // Tanggal transaksi
            $table->date('date');

            // Nominal uang
            $table->bigInteger('amount');

            // Catatan tambahan (misal: recipe_id:12)
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
