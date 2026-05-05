<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cooker extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'nameLogo',
        'content_fr',
        'content_en',
        'image',
        'created_at',
        'created_by',
        'deleted',
        'deleted_at',
        'deleted_by',
    ];
}
