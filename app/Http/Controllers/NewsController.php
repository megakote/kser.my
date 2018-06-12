<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['news'] = News::latest()->get();

        return view('news', $data);
    }
}
