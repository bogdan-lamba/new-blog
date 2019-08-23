<div class="card mb-3" style="width: 17rem;">
    <img class="card-img-top" src="{{ asset('argon/img/theme/team-3-800x800.jpg') }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ Str::limit($post->content, 50) }}</p>
        <p class="card-text text-sm">By <b>{{ $post->owner() }}</b> on <i>{{ $post->published_date }}</i></p>
        <a href="{{ $post->path() }}" class="btn btn-primary">Read more</a>
    </div>
    <div>
        @include ('posts.tags')
    </div>

</div>
