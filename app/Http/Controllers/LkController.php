<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use Auth;

class LkController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        $data['orders'] = Auth::user()->client->orders;

        if($request->order_id) {
            $data['orders'] = $data['orders']->where('nomer', $request->order_id);
        }
        return view('lk', $data);
    }
}
