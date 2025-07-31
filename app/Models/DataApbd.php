<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DataApbd extends Model
{
    use HasFactory, Notifiable;
    protected $table='dataapbd';
    protected $fillable = [
        'file_apbd',
        'pendapatan',
        'pengeluaran',
        'belanja',
        'surplus_defisit',
    ];
}