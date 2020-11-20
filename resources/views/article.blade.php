@extends('layouts.master')

@section('title', $title ?? 'Homepage')

@section('content')

<div class="container justify-content-md-center">
    <div class="row">
                        <div class="col-4 align-content-center article-image-wrapper">
                                <div class="">
                                        <a class="" href="./articles/{{$article->id}}">
                                                <img class="b-lazy" src="/img/{{ $article->cover }}.png" width="224" height="304">
                                        </a>
                                        <div class="article-tags p-2">
                                            @foreach ($article->tags as $tag)
                                                <a class="btn btn-info btn-sm">{{$tag->title}}</a>
                                            @endforeach
                                        </div>
                                </div>
                        </div>
                        <div class="col-4 article-text p-1">
                            <div class="w-100" id="counters" data-id="{{$article->id}}">
                                <span class="likes-count">{{$counters->likes}}</span><i class="fas fa-thumbs-up like"></i>
                                <span class="views-count pl-2">{{$counters->views}}</span> Views
                            </div>
                            <div class="w-100">
                                {{$article->text}}
                            </div>
                        </div>

    </div>
    <div class="row">
        <div class="col-10">
            <form name="comment" action="/api/v01/comment">
                <div class="alert alert-danger hide" role="alert">
                    An Error Occurred, Please Try Again Later!
                </div>
                <div class="form-group">
                    <label for="">Comment</label>
                    <input type="text" class="form-control" name="title" placeholder="Theme">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="text" rows="3" placeholder="Text"></textarea>
                </div>
                <input type="hidden" name="article_id" value="{{$article->id}}"/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="alert alert-success" role="alert">
                This is a success!
            </div>
        </div>
    </div>
</div>
@endsection
