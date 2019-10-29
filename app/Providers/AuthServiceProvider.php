<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Review;

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
        $this->registerPolicies();

        Gate::define('admin', function($user) {
            return $user->id == 2;
        });

        Gate::define('create_review', function($user, $movie) {
            return Review::where('user_id', $user->id)->where('movie_id', $movie->id)->count() == 0;
        });

        Gate::define('movie_detail', function($user, $movie) {
            return $movie->year <= 2010;
        });

    }


}
