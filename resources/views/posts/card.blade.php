<div class="card mb-3" style="width: 17rem;">
    <img class="card-img-top" src="{{ asset($post->imagePath()) }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ Str::limit($post->content, 50) }}</p>
        <p class="card-text text-sm">By <b>{{ $post->owner() }}</b>
            on <i>{{ \Carbon\Carbon::parse( $post->published_date)->format('d-m-Y') }}</i></p>
        <a href="{{ $post->path() }}" class="btn btn-primary">Read more</a>
    </div>
    <div>
        @include ('posts.tags')
    </div>

</div>
