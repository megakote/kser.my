<?php

namespace App\Http\ViewComposers;

use App\Models\Menu;
use App\Models\Page;
use Cache;
use Illuminate\View\View;
use Illuminate\Http\Request;

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
//        $menu_header = Cache::remember('menu_header', 10000, function () {
//            $header_id = Menu::where('place', 'header')->first()->id;
//            return Menu::where('active', true)->where('parent_id', $header_id)->defaultOrder()->with([
//                'descendants' => function ($q) {
//                    return $q->where('active', true);
//                }
//            ])->get();
//        });
        $header_id = Menu::where('place', 'header')->first()->id;
        $menu_header = Menu::where('active', true)->where('parent_id', $header_id)->defaultOrder()->with([
            'descendants' => function ($q) {
                return $q->where('active', true);
            }
        ])->get();
        $view->with('menu_header', $menu_header);

        $main_menu = Page::all()->take(11);

        $view->with('main_menu', $main_menu);

        //Меню подвал
//        $menu_footer1 = Cache::remember('menu_footer1', 10000, function () {
//            return Menu::where('place', 'footer1')->first()->descendants()->defaultOrder()->where('active', true)->get();
//        });
        $menu_footer1 = Menu::where('place', 'footer1')->first()->descendants()->defaultOrder()->where('active', true)->get();
        $view->with('menu_footer1', $menu_footer1);

        //Меню подвал2
//        $menu_footer2 = Cache::remember('menu_footer2', 10000, function () {
//            return Menu::where('place', 'footer2')->first()->descendants()->defaultOrder()->where('active', true)->get();
//        });
        $menu_footer2 = Menu::where('place', 'footer2')->first()->descendants()->defaultOrder()->where('active', true)->get();
        $view->with('menu_footer2', $menu_footer2);

//        Законсервировано до лучших времен
//        if (request()->order_id) {
//            $order = Order::where('nomer', request()->order_id)->first();
//            $view->with('order_info', $order);
//        }
    }
}
