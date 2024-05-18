<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = ['fonds', 'membre', 'montant', 'date_paiement'];

    public function fonds()
    {
        return $this->belongsTo(Fonds::class);
    }

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
