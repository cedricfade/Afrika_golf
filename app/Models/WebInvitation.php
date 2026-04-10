<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AutoCreateAttributes;

class WebInvitation extends Model
{
    use AutoCreateAttributes;

    protected $fillable = [
        'nomComplet',
        'email',
        'objet',
        'message',
        'page',
    ];

    public $timestamps = false;
}
