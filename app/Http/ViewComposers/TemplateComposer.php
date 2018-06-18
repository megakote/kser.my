<?php

namespace App\Http\ViewComposers;

use App\Models\Menu;
use Cache;
use Illuminate\View\View;

class TemplateComposer
{
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     */
    public function compose(View $view)
    {
        //Меню шапка
        $menu_header = Cache::remember('menu_header', 10000, function () {
            $header_id = Menu::where('place', 'header')->first()->id;
            return Menu::where('active', true)->where('parent_id', $header_id)->defaultOrder()->with([
                'descendants' => function ($q) {
                    return $q->where('active', true);
                }
            ])->get();
        });
        $view->with('menu_header', $menu_header);

        //Меню подвал
        $menu_footer1 = Cache::remember('menu_footer1', 10000, function () {
            return Menu::where('place', 'footer1')->first()->descendants()->defaultOrder()->where('active', true)->get();
        });
        $view->with('menu_footer1', $menu_footer1);

        //Меню подвал2
        $menu_footer2 = Cache::remember('menu_footer2', 10000, function () {
            return Menu::where('place', 'footer2')->first()->descendants()->defaultOrder()->where('active', true)->get();
        });
        $view->with('menu_footer2', $menu_footer2);
    }
}
