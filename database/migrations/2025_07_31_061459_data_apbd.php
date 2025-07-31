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
         Schema::create('dataapbd', function (Blueprint $table) {
            $table->id();
            $table->integer('pendapatan');
            $table->integer('pengeluaran');
            $table->integer('belanja');
            $table->integer('surplus_defisit');
            $table->string('file_apbd');
            $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
