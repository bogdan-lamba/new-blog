@csrf

<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-title">{{ __('Title') }}
        </label>
        <input
            type="text"
            name="title"
            id="input-title"
            class="form-control form-control-alternative{{$errors->has('title') ? ' is-invalid' : '' }}"
            placeholder="{{ __('Title') }}"
            value="{{ old('title') ?? $post->title }}"
            autofocus>

        @include ('posts.errors', ['input' => 'title'])
    </div>

    <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-content">{{ __('Content') }}</label>
        <textarea
            name="content"
            rows="5"
            id="input-content"
            class="form-control form-control-alternative{{$errors->has('content') ? ' is-invalid' : '' }}"
            placeholder="Content"
            autofocus>{{ old('content') ?? $post->content }}</textarea>

        @include ('posts.errors', ['input' => 'content'])
    </div>

    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-category">{{ __('Category') }}</label>

        <select
            name="category"
            id="input-category"
            class="form-control form-control-alternative{{$errors->has('category') ? ' is-invalid' : '' }}"
            autofocus>
                <option value="">Select Category</option>
            @foreach (\App\Category::all() as $category)
                <option value="{{ $category->id }}"
                    @if ($category->id == $post->category_id || $category->id == old('category'))
                        selected
                    @endif
                >{{ $category->name }}</option>
            @endforeach
        </select>

        @include ('posts.errors', ['input' => 'category'])
    </div>

    <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
        <label class="form-control-label" >{{ __('Tags') }}</label>
        <div class="row">
            @foreach (\App\Tag::all() as $tag)
                <div class="custom-control custom-control-alternative custom-checkbox ml-3">
                    <input
                        type="checkbox"
                        name="tags[]"
                        id="{{ $tag->name }}"
                        class=" custom-control-input"
                        value="{{ $tag->id }}"
                    @if ($post->tags->contains($tag) || (old('tags') && in_array($tag->id, old('tags'))))
                        checked
                        @endif
                    >

                    <label class="custom-control-label" for="{{ $tag->name }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        @include ('posts.errors', ['input' => 'tags'])
    </div>

    <div class="form-group{{ $errors->has('published_date') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="published">{{ __('Publish Date') }}</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input
                type="text"
                name="published_date"
                id="published"
                class="form-control datepicker"
                value="{{ old('published_date') ?? $post->published_date }}">
        </div>

        @include ('posts.errors', ['input' => 'published_date'])
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
        <label for="image">Image</label>
        <input
            name="image"
            type="file"
            id="image"
            class="form-control-file">

        @include ('posts.errors', ['input' => 'image'])
    </div>

    @if ($post->image_id)
        <img src="{{$post->imagePath() }}">
    @endif

    {{--TODO: disable submit on enter--}}
    <div class="row">
        <div class="text-center">
            <a href="{{ route('posts.dashboard') }}" class="btn btn-outline-success mt-4 mr-3">{{ __('Cancel') }}</a>
        </div>
        <div class="text-center">
            <button type="submit" name="status" value="draft" class="btn btn-success mt-4 mr-3" >{{ __('Save as draft') }}</button>
        </div>
        <div class="text-center">
            <button type="submit" name="status" value="published" class="btn btn-success mt-4 mr-3">{{ __('Publish') }}</button>
        </div>
    </div>
    @include ('posts.errors', ['input' => 'status'])
</div>
