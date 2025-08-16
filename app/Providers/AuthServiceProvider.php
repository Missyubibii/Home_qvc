<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('view-dashboard', function (User $user) {
            return in_array($user->role, ['admin', 'staff']);
        });

        Gate::define('manage-products', function (User $user) {
            return in_array($user->role, ['admin', 'staff']);
        });

        Gate::define('manage-categories', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('manage-users', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('manage-orders', function (User $user) {
            return in_array($user->role, ['admin', 'staff']);
        });

        Gate::define('manage-ads', function (User $user) {
            return in_array($user->role, ['admin', 'staff']);
        });
    }
}
