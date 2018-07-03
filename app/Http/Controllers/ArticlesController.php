<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\ArticleCategory;

class ArticlesController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        if ($slug) {
            return $this->show($slug);
        }
        $data = [];
        $data['categories'] = ArticleCategory::all();
        if ($request->category){
            $category = ArticleCategory::where('title', $request->category)->first();
            $data['articles'] = Article::where('category_id', $category->id)->latest()->paginate(15) ;
        } else {
            $data['articles'] = Article::latest()->paginate(15);
        }

        return view('articles', $data);
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('page', $article);
    }
}
