<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'image',
        'brochure',
        'title',
        'symbole_fr',
        'symbole_en',
        'space_fr',
        'space_en',
        'price',
        'ranking',
        'created_at',
        'created_by',
        'deleted',
        'deleted_at',
        'deleted_by',
    ];
}
