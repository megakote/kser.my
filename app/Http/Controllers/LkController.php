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

        dd(Auth::user());

        return view('lk', $data);
    }
}
