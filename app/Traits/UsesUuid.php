<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{
    /**
     * Boot the trait to add the UUID on model creation.
     */
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Specify that the primary key is a string.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Disable auto-incrementing for the primary key.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
}
