<?php

namespace App\Models;

use App\Tweets\TweetType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function avatar(){
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
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

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    public function following(){
        return $this->belongsToMany(
         //   Follower::class, 'followers', 'user_id', 'following_id'
            User::class, 'followers', 'user_id', 'following_id'
        )->withTimestamps();
    }

    public function followers(){
        return $this->belongsToMany(
          //  Follower::class, 'followers', 'following_id', 'user_id'
            User::class, 'followers', 'following_id', 'user_id'
        )->withTimestamps();
    }

    public function tweetsFromFollowing(){
        return $this->hasManyThrough(
            Tweet::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id'
        );
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function hasLiked(Tweet $tweet){
        return $this->likes->contains('tweet_id', $tweet->id);
    }

    public function retweets(){
//        return $this->hasMany(Tweet::class)
//            ->where('type', TweetType::RETWEET)
//            ->orWhere('type', TweetType::QUOTE);
        return $this->hasMany(Tweet::class)->where(function($query) {
            return $query->where('type', TweetType::RETWEET)
                ->orWhere('type', TweetType::QUOTE);
        });
    }
}
