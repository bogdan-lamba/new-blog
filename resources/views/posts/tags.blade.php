@if(count($post->tags))
    Tags:
    @foreach ($post->tags as $tag)
        <a href="/posts/tags/{{ $tag->name }}" class="btn btn-outline-primary btn-sm mr-0 ml-0 mb-1" > {{ $tag->name }} </a>
    @endforeach
@endif
