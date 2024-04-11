<?php

namespace App\Data;

use App\Data\UserData;
use Spatie\LaravelData\Data;

class SharedData extends Data
{
    public function __construct(
        public readonly SecurityData $security,
        public readonly ?FlashData $flash,
        public readonly ?UserData $auth_user,
    ) {
    }
}
