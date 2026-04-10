<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaSpace extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'file',
        'type',
        'created_at',
        'created_by',
        'deleted',
        'deleted_at',
        'deleted_by',
    ];

    public function getFormattedDateAttribute(): string
    {
        if (!$this->created_at) {
            return '';
        }
        return \Carbon\Carbon::createFromTimestamp($this->created_at)
            ->locale('fr')
            ->isoFormat('D MMMM YYYY');
    }
}
