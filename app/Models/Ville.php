<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = [
        'label',
        // 'responsable',
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
}
