<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('admin', function (User $user) {
            return (bool) $user->is_admin;
        });

        Gate::define('delete-comment', function ($user, $comment) {
            return $user->id === $comment->user_id || $user->is_admin;
        });    
        
    }
}
