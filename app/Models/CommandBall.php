<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AutoCreateAttributes;

class CommandBall extends Model
{
    use AutoCreateAttributes;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'nombre_de_balles',
    ];

    public $timestamps = false;
}
