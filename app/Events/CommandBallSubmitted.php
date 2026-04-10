<?php

namespace App\Events;

use App\Models\CommandBall;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommandBallSubmitted
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public readonly CommandBall $command
    ) {}
}
