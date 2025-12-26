<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use HasFactory, Notifiable;
    protected $table='news';
    protected $fillable = [
        'title',
        'description',
        'date',
        'image'
    ];
}