<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Article;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        if ($request->q) {
            $query = $request->q;

            $news = News::search($query)->get();
            $articles = Article::search($query)->get();
            $all = $news->merge($articles);

            if ($all->count()){
                $data['news'] = paginate($all)->appends($request->except('page'));
                return view('news', $data);
            }

        }

        return view('page', ['title' => 'Извините', 'body' => 'ничего не найдено']);

    }
}
