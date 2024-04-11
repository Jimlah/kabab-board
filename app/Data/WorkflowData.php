<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class WorkflowData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?int $order = null,
        public readonly ?int $project_id = null,
    ) {
    }
}
