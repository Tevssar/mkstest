<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::orderBy('id', 'desc')->take(5)->get();
        return view('homepage', ['title' => 'lastest articles', 'articles'  => $articles]);
    }

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function catalog()
    {
        $articles = Articles::orderBy('id', 'desc')->simplePaginate(15);
        return view('catalog', ['title' => 'all articles', 'articles'  => $articles]);
    }

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function page(Articles $article)
    {
        return view('article', ['title' => 'article', 'article'  => $article]);
    }


}
