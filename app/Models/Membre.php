<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groupe;
use App\Models\Paiement;

class Membre extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
       'email',
       'nom',
       'prenom',
       'tel',
       "groupe",
       'date_adhesion',
       'date_naissance',
       'image',
   ];

   public function groupe()
   {
       return $this->belongsTo(Groupe::class);
   }

   public function section()
   {
       return $this->hasOneThrough(Section::class, Groupe::class);
   }

   public function ville()
   {
       return $this->hasOneThrough(Ville::class, Section::class, 'id', 'id', 'groupe_id', 'ville_id');
   }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    
}
