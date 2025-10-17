<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Financial extends Model
{
    use HasFactory, Notifiable;
    protected $table='financial';
    protected $fillable = [
        'years',
        'income',
        'spending',
    ];
}
