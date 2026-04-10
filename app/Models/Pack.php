<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'image',
        'title',
        'symbole',
        'space',
        'price',
        'ranking',
        'created_at',
        'created_by',
        'deleted',
        'deleted_at',
        'deleted_by',
    ];
}
