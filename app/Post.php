<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'category_id', 'user_id', 'image_id', 'status', 'published_date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function owner()
    {
        return $this->user->name;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function path()
    {
        return "/posts/{$this->id}";
    }

    public function imagePath()
    {
        if($this->image)
            return asset('storage/posts/images/' . $this->image->name);

        return asset('argon/img/theme/team-3-800x800.jpg');
    }


    public function addTags($tags)
    {
        foreach ($tags as $tag) {
            $this->tags()->attach($tag);
        }
    }

    public function updateTags($tags)
    {
        $this->tags()->detach();//TODO: better update for pivot

        foreach ($tags as $tag) {
            $this->tags()->attach($tag);
        }
    }
}
