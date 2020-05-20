<?php

namespace App\Providers;

use App\Repositories\ResetPassword\ResetPasswordRepositoryInterface;
use App\Repositories\Team\TeamRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\VerifiedRegister\VerifiedRegisterRepositoryInterface::class,
            \App\Repositories\VerifiedRegister\VerifiedRegisterEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ResetPassword\ResetPasswordRepositoryInterface::class,
            \App\Repositories\ResetPassword\ResetPasswordEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Profile\ProfileRepositoryInterface::class,
            \App\Repositories\Profile\ProfileEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Team\TeamRepositoryInterface::class,
            \App\Repositories\Team\TeamEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('currentUser', Auth::check() ? Auth::user() : false);
        });
    }
}
