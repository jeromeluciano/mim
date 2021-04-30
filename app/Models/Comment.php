<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['user'];
    protected $appends = ['commentedAt'];
    protected $hidden = [
        'tweet_id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }

    public function getCommentedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
