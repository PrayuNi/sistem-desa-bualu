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
         Schema::create('datapenduduk', function (Blueprint $table) {
            $table->id();
            $table->integer('penduduk');
            $table->integer('laki_laki');
            $table->integer('perempuan');
            $table->integer('mutasi_penduduk');
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
