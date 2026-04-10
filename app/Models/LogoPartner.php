<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogoPartner extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'image',
        'libelle',
        'created_at',
        'created_by',
        'deleted',
        'deleted_at',
        'deleted_by',
    ];
}
