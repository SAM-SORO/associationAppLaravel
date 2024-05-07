<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = [
        'label',
        // 'responsable',
        'section_id',
    ];

    // Relation avec l'utilisateur responsable du groupe
    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable');
    }

    // Relation avec la section du groupe
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    
}
