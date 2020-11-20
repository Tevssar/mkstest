@extends('layouts.master')

@section('title', $title ?? 'Homepage')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($articles as $article)
                        <div class="col-4 align-content-center">
                                <div class="listing">
                                        <a class="listing__image-wrapper" href="articles/{{$article->id}}">
                                                <img class="b-lazy" src="/img/{{ $article->cover }}-100.png" width="150" >
                                        </a>
                                        <div class="article-tags p-2">
                                            @foreach ($article->tags as $tag)
                                                <a class="btn btn-info btn-sm">{{$tag->title}}</a>
                                            @endforeach
                                        </div>
                                </div>

                        </div>
        @endforeach
    </div>

</div>
@endsection
