@extends('layouts.master')

@section('title', $title ?? 'Homepage')

@section('content')

<div class="container justify-content-md-center">
    <div class="row">
        @foreach ($articles as $article)
                        <div class="col-4 align-content-center">
                                <div class="listing">
                                        <a class="listing__image-wrapper" href="articles/{{$article->id}}">
                                                <img class="b-lazy" src="/img/{{ $article->cover }}.png" width="224" height="304">
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
    <div class="row justify-content-md-center p-2">
        <div>
            {{ $articles->links() }}
        </div>
    </div>

</div>
@endsection
