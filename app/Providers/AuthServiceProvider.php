<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Project;
use App\Models\Task;
use App\Models\Team;
use App\Models\TeamUser;
use App\Policies\ProjectPolicy;
use App\Policies\TaskPolicy;
use App\Policies\TeamPolicy;
use App\Policies\TeamUserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Project::class => ProjectPolicy::class,
        Task::class => TaskPolicy::class,
        Team::class => TeamPolicy::class,
        TeamUser::class => TeamUserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
