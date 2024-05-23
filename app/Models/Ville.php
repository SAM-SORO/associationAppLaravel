<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = [
        'label',
        // 'responsable',
        'sections'
    ];

    // Relation avec l'utilisateur responsable de la ville
    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable');
    }

    // Relation avec les sections de la ville
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function groupes()
    {
        return $this->hasManyThrough(Groupe::class, Section::class, 'ville_id', 'section_id', 'id', 'id');
    }
    
}
