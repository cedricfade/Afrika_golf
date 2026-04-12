<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InviteGroupSubmitted
{
    use Dispatchable, SerializesModels;

    /**
     * @param \App\Models\Invite[] $invites
     */
    public function __construct(
        public readonly array $invites
    ) {}
}
