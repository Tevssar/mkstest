<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Counters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Articles::orderBy('id', 'desc')->with('tags')->take(6)->get();
        return view('homepage', ['title' => 'lastest articles', 'articles'  => $articles]);
    }


    public function catalog()
    {
        $articles = Articles::orderBy('id', 'desc')->simplePaginate(9);
        return view('articles', ['title' => 'all articles', 'articles'  => $articles]);
    }


    public function page(Articles $article)
    {
        $likes = Redis::get("$article->id:likes:");
        $views = Redis::get("$article->id:views:");
        if (!$likes || !$views) {
            $counters = Counters::firstOrCreate(['articles_id' => $article->id]);
            Redis::set("$article->id:likes:", $counters->likes);
            Redis::set("$article->id:views:", $counters->views);
        } else {
            $counters = new  Counters;
            $counters->likes = $likes;
            $counters->views = $views;
        }
        return view('article', ['title' => 'article', 'article'  => $article, 'counters' => $counters]);
    }

}
