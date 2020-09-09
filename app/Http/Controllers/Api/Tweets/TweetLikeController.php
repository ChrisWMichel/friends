<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\LikesWereUpdated;
use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Tweet $tweet, Request $request)
    {
        if($request->user()->hasLiked($tweet)){
            return response(null, 409);
        }
        $request->user()->likes()->create([
            'tweet_id' => $tweet->id
        ]);

        broadcast(new LikesWereUpdated($request->user(), $tweet));
    }



    public function destroy(Tweet $tweet, Request $request)
    {
        $request->user()->likes()->where('tweet_id', $tweet->id)->first()->delete();

        broadcast(new LikesWereUpdated($request->user(), $tweet));
    }
}
