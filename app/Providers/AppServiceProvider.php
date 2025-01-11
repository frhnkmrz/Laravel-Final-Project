<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Grant;
use App\Models\Milestone;
use App\Models\Academician;
use Illuminate\Support\Facades\Schema;
use App\Policies\GrantPolicy;
use App\Policies\MilestonePolicy;
use App\Policies\AcademicianPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Grant::class => GrantPolicy::class,
        Milestone::class => MilestonePolicy::class,
        Academician::class => AcademicianPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        {
        Schema::defaultStringLength(191);
        }
        
        // Register the policies defined above
        $this->registerPolicies();

        // Define gates for role-based access
        Gate::define('isAdmin', function (User $user) {
            return $user->userCategory === 'admin';
        });

        Gate::define('isLeader', function (User $user) {
            return $user->userCategory === 'leader';
        });

        Gate::define('isStaff', function (User $user) {
            return $user->userCategory === 'staff';
        });
    }
}
