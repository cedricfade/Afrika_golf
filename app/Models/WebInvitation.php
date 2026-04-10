<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AutoCreateAttributes;

class WebInvitation extends Model
{
    use AutoCreateAttributes;

    protected $fillable = [
        'nom_complet',
        'email',
        'objet',
        'message',
        'page',
    ];

    public $timestamps = false;
}
