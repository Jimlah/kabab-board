<?php

namespace App\Tables;

use App\Data\WorkflowData;
use App\Models\Workflow;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Actions;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;

final class WorkflowTable extends Table
{
    protected string $model = Workflow::class;
    protected string $data = WorkflowData::class;

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#'),
            Columns\TextColumn::make('name')->label('Name'),
            Columns\TextColumn::make('description')->label('Description'),
            Columns\TextColumn::make('order')->label('Order'),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('id'),
        ];
    }

    protected function defineActions(): array
    {
        return [];
    }
}
