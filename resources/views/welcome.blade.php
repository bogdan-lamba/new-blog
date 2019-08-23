@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Welcome to our Blog.') }}</h1>
                    </div>
                </div>
            </div>
            <div class="row" >
                @forelse ($posts as $post)
                        <div class="col-xl-3 col-lg-6">
                            @include ('posts.card')
                        </div>
                @empty
                    <h2 class="text-white">No Posts yet.</h2>
                @endforelse
            </div>
            @if (!Route::is('tags'))
                <div>{{ $posts->links() }}</div>
                @endif


        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
