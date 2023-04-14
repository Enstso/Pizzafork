<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'picture', 'prix'];

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'garnitures', 'idPizza', 'idIngredient')->withPivot('id', 'order', 'quantity', 'idPizza', 'idIngredient');
    }
}
