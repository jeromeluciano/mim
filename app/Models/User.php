<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SearchableTrait;

    protected $searchable = [
        'columns' => [
            'users.name' => 2,
            'users.email' => 1
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at'
    ];

    // protected $appends = ['tweetsId'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getTweetsIdAttribute()
    {
        return $this->tweets->pluck('id');
    }
}
