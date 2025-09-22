<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProfilDesa extends Model
{
    use HasFactory, Notifiable;
    protected $table='profildesa';
    protected $fillable = [
        'image',
        'sambutan_bendesa',
        'name',
        'sejarah_desa',
        'visi_desa',
        'misi_desa',
    ];
}