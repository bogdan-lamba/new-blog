<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('published_date', 'desc')
            ->where('status', 'published')
            /*->where('published_date', '<', now())*/
            ->paginate(12);

        return view('posts.index', compact('posts'));
    }

    public function dashboard()
    {
        if (Gate::allows('manage-posts')) {
            $posts = Post::orderBy('published_date', 'desc')
                ->paginate(12);
        } else {
            $posts = Post::orderBy('published_date', 'desc')
                ->where('user_id', auth()->user()->id)
                ->paginate(12);
        }

        return view('posts.dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validateRequest();

        $image = Image::firstOrCreate(
            ['name' => request('image')->getClientOriginalName()]
        );

        $post = auth()->user()->posts()->create([
            'title' => request('title'),
            'content' => request('content'),
            'category_id' => request('category'),
            'image_id' => $image->id,
            'published_date' => Carbon::parse(request('published_date'))->format('Y-m-d'),
            'status' => request('status')
        ]);

        $post->addTags(request('tags'));

        Storage::disk('public')->putFileAs('posts/images' , request()->file('image'), $image->name);

        $image->save();

        return redirect(route('posts.dashboard'))->withStatus(__('Post successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Post $post)
    {
       if (Gate::denies('manage-post', $post))
           abort(403, 'You don\'t have permission to change this post');

        $this->validateRequest($post->image_id);

        if (request('image')) {
            $image = Image::firstOrCreate(
                ['name' => request('image')->getClientOriginalName()]
            );

            Storage::disk('public')->putFileAs('posts/images' , request()->file('image'), $image->name);

            $image_id = $image->id;

            $image->save();
        }

        $post->update([
            'title' => request('title'),
            'content' => request('content'),
            'category_id' => request('category'),
            'image_id' => $image_id ?? $post->image_id,
            'published_date' => Carbon::parse(request('published_date'))->format('Y-m-d'),
            'status' => request('status')
        ]);

        $post->updateTags(request('tags'));

        return redirect(route('posts.dashboard'))->withStatus(__('Post successfully modified.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        //TODO: maybe delete image from storage if its the last post with that image

        return redirect()->route('posts.dashboard')->withStatus(__('Post successfully deleted.'));
    }

    protected function validateRequest($image = null)
    {
        return request()->validate([
            'title' => 'required|min:3|max:200',
            'content' => 'required|min:10|max:3000',
            'category' => 'required|exists:categories,id',
            'tags' => 'required|array|min:2',
            'tags.*' => 'required|exists:tags,id',
            'published_date' => 'required|date',
            'image' => Rule::requiredIf(!$image) .  '|image|mimes:jpeg,jpg,png|max:4096‬',
            'status' => 'required'
        ]);
    }
}
