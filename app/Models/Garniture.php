<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garniture extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'order', 'quantity', 'idIngredient', 'idPizza'];
}
