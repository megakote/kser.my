<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        if ($slug) {
            return $this->show($slug);
        }

        $data = [];
        $data['news'] = News::latest()->paginate(15);

        return view('news', $data);
    }

    public function show($slug)
    {
        $article = News::where('slug', $slug)->first();
        return view('page', $article);
    }
}
