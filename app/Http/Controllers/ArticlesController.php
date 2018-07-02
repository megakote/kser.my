<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['news'] = Article::latest()->paginate(15);

        return view('news', $data);
    }
}
