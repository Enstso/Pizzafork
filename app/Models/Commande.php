<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pizza;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commande';
    protected $fillable = ['id', 'total', 'date_commande', 'idUser'];

    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class, 'panier', 'idCommande', 'idPizza')->withPivot('quantity');
    }
}
