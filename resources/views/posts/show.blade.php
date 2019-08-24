@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="row" >
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">

                        <h3>{{ $post->title }}</h3>
                        <h4>Author: {{ $post->owner() }} published on {{ $post->published_date }}</h4>
                        <img class="card-img-top " src="{{ $post->imagePath() }}" alt="Card image cap">

                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->content }}</p>

                        @can ('manage-post', $post)
                            <div class="mb-3">
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ route('posts.destroy', $post) }}" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        @endcan

                        <a href="/" class="btn btn-primary">All posts</a>
                    </div>

                    <div>
                        @include ('posts.tags')
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
