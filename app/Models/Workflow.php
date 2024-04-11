<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperWorkflow
 */
class Workflow extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'description',
        'project_id',
        'order',
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
