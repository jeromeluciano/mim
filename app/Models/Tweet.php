<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['user'];
    protected $appends = ['likesCount', 'liked'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($id = null)
    {
        return $this->likes()->create([
            'user_id' => $id ? $id : auth('web')->id(),
        ]);
    }

    public function dislike($id = null)
    {
        $userId = $id ? $id : auth('web')->id(); 
        return $this->likes()->where('user_id', $userId)->delete();
    }
    public function isLikedBy($id = null)
    {
        $userId = $id ? $id : auth('web')->id();
        $matches = ['user_id' => $userId, 'tweet_id' => $this->id];
        return (bool) Like::where($matches)->get()->count() > 0;
    }
    public function toggleLike($id = null)
    {
        if ($this->isLikedBy($id))
        {
            return $this->dislike($id);
        }

        return $this->like($id);
    }

    // static function
    public static function trendings()
    {
        return Tweet::with('user')->paginate(6)->sortByDesc('likesCount');
    }

    // computed attributes
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function getLikedAttribute()
    {
        return $this->isLikedBy();
    }

}
