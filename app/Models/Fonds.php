<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonds extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'departement',
        'montant',
        'debut',
        'fin',
        'auteur',
        'desc'
    ];

    // Définir les relations si nécessaire
    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}
