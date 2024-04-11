<?php

namespace App\Data;

use Carbon\CarbonInterface;
use Illuminate\Support\Traits\Dumpable;
use Spatie\LaravelData\Data;

final class UserData extends Data
{
    use Dumpable;
    public function __construct(
        public readonly ?int $id,
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $email,
        public readonly ?CarbonInterface $email_verified_at,
    ) {
    }
}
