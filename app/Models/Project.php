<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Lift\Attributes\Relations\HasMany;
use WendellAdriel\Lift\Lift;

/**
 * @mixin IdeHelperProject
 */
#[HasMany(Workflow::class)]
class Project extends Model
{
    use HasFactory, HasUlids, Lift;

    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
