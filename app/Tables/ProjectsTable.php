<?php

namespace App\Tables;

use App\Models\Project;
use Hybridly\Refining\Filters\Filter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Actions;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Columns\TextColumn;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class ProjectsTable extends Table
{

    protected string $model = Project::class;
    protected string $scope = 'projects';

    protected function defineColumns(): array
    {
        return [
            TextColumn::make('id')
                ->label('ID'),
            TextColumn::make('name')
                ->label('Name'),
            TextColumn::make('description')
                ->label('Description'),
            TextColumn::make('user')
                ->label('User')
                ->transformValueUsing(function (Project $project) {
                    return $project->user->fullname;
                }),
        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Filter::make('name')
                ->label('Search')->loose(),
            Filter::make('user_id')
                ->label('user')
        ];
    }

    protected function defineActions(): array
    {
        return [];
    }

    protected function defineQuery(): Builder
    {
        return $this->getModel()->query()->with('user')->latest();
    }
}
