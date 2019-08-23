@csrf

<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
        <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{
                                    $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title')
                                     }}" required autofocus>

        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-content">{{ __('Content') }}</label>
        <textarea name="content" id="input-content" rows="5" class="form-control form-control-alternative{{
                                    $errors->has('content') ? ' is-invalid' : '' }}" placeholder="{{ __('Content') }}" value="{{ old
                                    ('content')
                                     }}" required autofocus></textarea>

        @if ($errors->has('content'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-category">{{ __('Category') }}</label>
        <select name="category" id="input-category" class="form-control form-control-alternative{{
                                    $errors->has('category') ? ' is-invalid' : '' }}" required autofocus>
            <option value="">Select Category</option>
            @foreach (\App\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        @if ($errors->has('category'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('tags') ? ' has-danger' : '' }}">
        <label class="form-control-label" >{{ __('Tags') }}</label>
        <div class="row">
            @foreach (\App\Tag::all() as $tag)
                <div class="custom-control custom-control-alternative custom-checkbox ml-3">
                    <input name="{{ $tag->name }}" class="custom-control-input" id="{{ $tag->name }}"
                           type="checkbox">
                    <label class="custom-control-label" for="{{ $tag->name }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        @if ($errors->has('tags'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tags') }}</strong>
                                        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('published_date') ? ' has-danger' : '' }}">
        <label class="form-control-label" >{{ __('Publish Date') }}</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker" placeholder="Select date" type="text" value="{{ now() }}">
        </div>

        @if ($errors->has('published_date'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('published_date') }}</strong>
                                        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
        <label for="image">Image</label>
        <input name="image" type="file" class="form-control-file" id="image">

        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
        @endif
    </div>


    <div class="row">
        <div class="text-center">
            <a href="{{ route('posts.dashboard') }}" class="btn btn-outline-success mt-4 mr-3">{{ __('Cancel') }}</a>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4 mr-3" >{{ __('Save as draft') }}</button>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4 mr-3">{{ __('Publish') }}</button>
        </div>
    </div>
</div>
