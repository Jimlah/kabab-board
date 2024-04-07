<?php

namespace App\Tables;

use App\Models\Project;
use Hybridly\Tables\Table;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Actions;
use Hybridly\Tables\Columns;
use Illuminate\Support\Collection;
use Hybridly\Refining\Filters\Filter;
use Hybridly\Tables\Actions\BulkAction;
use Hybridly\Tables\Columns\TextColumn;
use Illuminate\Contracts\Database\Eloquent\Builder;

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
        return [
            BulkAction::make('delete')
                ->label('Delete')
                ->action(fn (Collection $projects) => dd($projects))
        ];
    }

    protected function defineQuery(): Builder
    {
        return $this->getModel()->query()->with('user')->latest();
    }
}
