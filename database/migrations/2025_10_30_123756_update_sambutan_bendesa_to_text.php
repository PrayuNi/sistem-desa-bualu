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
        Schema::table('profildesa', function (Blueprint $table) {
        $table->text('sambutan_bendesa')->change();
        $table->text('sejarah_desa')->change();
        $table->text('visi_desa')->change();
        $table->text('misi_desa')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profildesa', function (Blueprint $table) {
        $table->string('sambutan_bendesa', 200)->change();
        $table->string('sejarah_desa', 255)->change();
        $table->string('visi_desa', 255)->change();
        $table->string('misi_desa', 255)->change();
        });
    }
};
