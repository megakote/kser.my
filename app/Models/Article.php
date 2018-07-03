<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Article extends Model
{
    use Sluggable, SearchableTrait;

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'articles.title' => 20,
            'articles.body' => 10,
        ]
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }

    public function getUrlAttribute()
    {
        return '/articles/' . $this->category->slug . '/' . $this->slug;
//        return '/articles/' . $this->category->slug . '/' . $this->slug;
    }
}
