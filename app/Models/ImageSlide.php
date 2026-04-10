<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageSlide extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'content',
        'page',
        'ranking',
        'created_at',
        'created_by',
        'deleted',
        'deleted_at',
        'deleted_by',
    ];
}
