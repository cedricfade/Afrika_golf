<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait AutoCreateAttributes
{
    /**
     * Boot the trait to automatically set created_by and created_at
     */
    public static function bootAutoCreateAttributes()
    {
        // Attach to the model's creating event
        static::creating(function ($model) {
            if (Auth::check()) {
                // Set the created_by attribute if it's not already set
                $model->created_by = Auth::id();
            }

            // Set the created_at attribute if it's not already set
            if (empty($model->created_at)) {
                $model->created_at = time();
            }
        });
    }
}
