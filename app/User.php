<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use YoHang88\LetterAvatar\LetterAvatar;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function hasRole($role)
    {
        if ($this->role->name == $role)
            return true;

        return false;
    }

    public function generateAvatar()
    {
        $avatar = new LetterAvatar($this->name, 'circle', '40');
        $avatar->saveAs('storage/' . $this->id . '.png', LetterAvatar::MIME_TYPE_PNG);
    }

    public function avatarPath()
    {
        return 'storage/' . $this->id . '.png';
    }
}
