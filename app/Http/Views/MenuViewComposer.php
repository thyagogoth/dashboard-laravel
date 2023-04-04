<?php

namespace App\Http\Views;

class MenuViewComposer
{

    public function compose($view)
    {

        dd($view);
        $menus = auth()->user()
            ->role
            // ->modules;
            ->resources()
            // ->where('is_menu', true)
            ->get();

        return $view->with('menus', $menus);
    }
}
