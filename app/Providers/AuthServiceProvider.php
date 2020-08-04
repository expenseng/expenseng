<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Admin privilages start
         */

        $this->registerPolicies();

        //edit rules
        Gate::define('edit', function ($user) {
            return $user->hasAnyRoles(['admin', 'manager', 'editor']);
        });

        //delete rules
        Gate::define('delete', function ($user) {
            return $user->hasRole('admin');
        });

        //create  rules
        Gate::define('add', function ($user) {
            return $user->hasRole('admin');
        });

        //edit privilage rules
        Gate::define('manage', function ($user) {
            return $user->hasAnyRoles(['admin', 'manager', 'editor']);
        });

        Gate::define('manage-user', function ($user) {
            return $user->hasAnyRoles(['admin', 'manager']);
        });

        //active user rules
        Gate::define('active', function ($user) {
            return $user->isActive(['active', 'inactive', 'suspended']);
        });
        /**
         * Admin privilages end
         */

        Gate::define(\WebDevEtc\BlogEtc\Gates\GateTypes::MANAGE_BLOG_ADMIN, static function ($user) {  
             return $user->hasAnyRoles(['admin', 'manager', 'editor']);
        });

    }
}
