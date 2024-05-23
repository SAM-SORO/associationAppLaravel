<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'label',
        'ville_id',
    ];

    // Relation avec l'utilisateur responsable de la section
    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable');
    }

    // Relation avec la ville de la section
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    // Relation avec l'auteur de la section
    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur');
    }

    // Relation avec les groupes de la section
    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
}

