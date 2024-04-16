<?php

namespace App\Data;

use Hybridly\Support\Data\DataResource;
use Spatie\LaravelData\Data;

class WorkflowData extends DataResource
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?int $order = null,
        public readonly ?string $project_id = null,
    ) {
    }
}
