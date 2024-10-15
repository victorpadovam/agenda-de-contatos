<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\User;
use App\Policies\ControleUsuarioPolicy;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    public function boot(): void
    {
        Gate::policy(User::class, ControleUsuarioPolicy::class);
    }
}
