<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AutoCreateAttributes;

class Invite extends Model
{
    use AutoCreateAttributes;

    protected $fillable = [
        'groupe_id',
        'type',
        'civilite',
        'nom',
        'prenom',
        'date_naissance',
        'adresse',
        'pays',
        'ville',
        'code_postal',
        'telephone',
        'email',
        'index_golf',
        'numero_licence',
        'taille_polo',
        'session',
        'page',
    ];

    public $timestamps = false;

    /**
     * Retourne tous les participants du même groupe.
     */
    public function groupeMembers()
    {
        return static::where('groupe_id', $this->groupe_id)->get();
    }
}
