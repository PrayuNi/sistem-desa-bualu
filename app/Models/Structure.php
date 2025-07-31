<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Structure extends Model
{
    use HasFactory, Notifiable;
    protected $table='structure';
    protected $fillable = [
        'name',
        'position',
        'image',
    ];
}


