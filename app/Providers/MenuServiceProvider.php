<?php

namespace App\Providers;

use App\Http\Views\MenuViewComposer;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
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
        view()->composer('admin.layout.app', function($view) {
            $menus = auth()->user()->role->resources()->where('is_menu', true)->get();
            $view->with('menus', $menus);
        });
    }
}
