<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ asset($post->image) }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ Str::limit($post->content, 50) }}</p>
        <a href="{{ $post->path() }}" class="btn btn-primary">Read more</a>
    </div>
</div>
