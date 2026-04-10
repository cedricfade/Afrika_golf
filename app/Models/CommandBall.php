<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AutoCreateAttributes;

class CommandBall extends Model
{
    use AutoCreateAttributes;

    protected $fillable = [
        'name',
        'first_name',
        'phone',
        'email',
        'balls',
    ];

    public $timestamps = false;
}
