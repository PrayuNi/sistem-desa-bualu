<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PengajuanSurat extends Model
{
    use HasFactory, Notifiable;
    protected $table='pengajuansurat';
    protected $fillable = [
        'name',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'nik',
        'jenis_surat',
        'no_whatsapp',
        'tanggal_pengajuan',
        'image',
        'print_able',
        'status'
    ];
}
