<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Data\UserData;
use App\Data\SharedData;
use App\Data\SecurityData;
use App\Models\Project;
use Hybridly\Http\Middleware;

class HandleHybridRequests extends Middleware
{
    /**
     * Defines the properties that are shared to all requests.
     */
    public function share(): SharedData
    {
        return SharedData::from([
            'security' => SecurityData::from([
                'user' => UserData::optional(auth()->user()),
                'project_count' => fn () => Project::count(),
            ]),
            'auth_user' => !app()?->isProduction() ?  UserData::optional(User::firstOrCreate(['email' => 'admin@admin'], ['first_name' => 'Admin', 'last_name' => 'Admin', 'password' => 'Pa$$w0rd!'])) : null,
        ]);
    }
}
