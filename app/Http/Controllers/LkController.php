<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use Auth;

class LkController extends Controller
{

    public function index(Request $request)
    {
//        dd(Auth::user()->client->orders);
        if (!(Auth::user() && Auth::user()->client)) {
            return redirect()->route('home');
        }

        $data = [];

        $data['orders'] = Auth::user()->client->orders()->orderBy('time_cr', 'desc')->get();

        if (!!$request->name_dop)
            $data['orders'] = $data['orders']->where('name_dop', $request->name_dop);

        if (!!$request->status && $request->status != "Все")
            $data['orders'] = $data['orders']->where('status', 'like', $request->status);

        if (!!$request->type)
            $data['orders'] = $data['orders']->where('type', 'like', $request->type);

        if(!!$request->order_id)
            $data['orders'] = $data['orders']->where('nomer', $request->order_id)->where('bill_number', $request->order_id);

        if(!!$request->date_from)
            $data['orders'] = $data['orders']->where('time_cr', '>', $request->date_from);

        if(!!$request->date_to)
            $data['orders'] = $data['orders']->where('time_cr', '<', $request->date_to);

        return view('lk', $data);
    }
}
