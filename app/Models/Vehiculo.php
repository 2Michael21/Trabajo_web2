<?php

namespace App\Models;

use Illluminate\Database\Eloquent\Factories\HasFactory;
use Illluminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'categoriia',
    ];
}
