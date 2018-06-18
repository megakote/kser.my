<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MainPagePricesTabs;
use App\Models\Client;
use App\Models\Feedback;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $data['pricesTabs'] = MainPagePricesTabs::all()->sortBy('order');
        $data['clients'] = Client::all();
        $data['feedback'] = Feedback::all();
        $data['slider'] = Slider::all();

        return view('home', $data);
    }
}
