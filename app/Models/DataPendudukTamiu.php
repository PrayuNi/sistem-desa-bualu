<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DataPendudukTamiu extends Model
{
    use HasFactory, Notifiable;
    protected $table='datapenduduktamiu';
    protected $fillable = [
        'penduduk',
        'laki_laki',
        'perempuan',
        'mutasi_penduduk',
    ];
}
