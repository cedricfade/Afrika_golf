<?php

namespace App\Events;

use App\Models\SponsoringRequest;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SponsoringSubmitted
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public readonly SponsoringRequest $sponsoring
    ) {}
}
