<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DataPenduduk extends Model
{
    use HasFactory, Notifiable;
    protected $table='datapenduduk';
    protected $fillable = [
        'penduduk',
        'laki_laki',
        'perempuan',
        'mutasi_penduduk',
    ];
}