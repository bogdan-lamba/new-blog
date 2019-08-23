@extends('layouts.app', ['title' => __('Edit post')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Edit post') }} {{ $post->id }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('posts.dashboard') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Post Information') }}</h6>
                        <form
                            method="POST"
                            action="{{ route('posts.edit', $post) }}"
                            autocomplete="on"
                            enctype="multipart/form-data">
                            @method('PATCH')

                    @include ('posts.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
