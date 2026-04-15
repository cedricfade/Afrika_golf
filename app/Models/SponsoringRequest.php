<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AutoCreateAttributes;

class SponsoringRequest extends Model
{
    use AutoCreateAttributes;

    protected $guarded = ['id'];

    public $timestamps = false;
}
