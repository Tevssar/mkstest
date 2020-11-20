<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Http\Requests\CommentForm;


class CommentsController extends Controller
{
    public function index()
    {
        //
    }

    public function store(CommentForm $request)
    {
        if (config('app.debug')) {
            sleep(10);
        }
        Comments::create($request->all());
    }
}
