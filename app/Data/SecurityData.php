<?php

namespace App\Data;

use Closure;
use Spatie\LaravelData\Data;

class SecurityData extends Data
{
    public function __construct(
        public readonly ?UserData $user,
        public readonly ?Closure $project_count,
    ) {
    }
}
