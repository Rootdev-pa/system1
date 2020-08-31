<?php

namespace App\Providers;

use App\Permiso;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermisosServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            Permiso::get()->map(function ($permiso) {
                Gate::define($permiso->slug, function ($user) use ($permiso) {
                    return $user->hasPermisoTo($permiso);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }

        //Blade directives
        Blade::directive('rol', function ($rol) {
             return "if(auth()->check() && auth()->user()->hasRol({$rol})) :"; //return this if statement inside php tag
        });

        Blade::directive('endrol', function ($rol) {
             return "endif;"; //return this endif statement inside php tag
        });

    }
}
