<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'label',
        'responsable',
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
}
