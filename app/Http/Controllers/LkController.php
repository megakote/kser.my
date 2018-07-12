<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use Auth;

class LkController extends Controller
{

    public function __construct()
    {

//        parent::__construct();

    }

    public function index(Request $request)
    {
        if (!(Auth::user() && Auth::user()->client)) {
            return redirect()->route('home');
        }

        $data = [];

        $data['orders'] = Auth::user()->client->orders;

        if($request->order_id) {
            $data['orders'] = $data['orders']->where('nomer', $request->order_id);
        }
        return view('lk', $data);
    }
}
