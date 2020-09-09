<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\RetweetsWereUpdated;
use App\Events\Tweets\TweetWasCreated;
use App\Events\Tweets\TweetWasDeleted;
use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class RetweetsController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tweet $tweet, Request $request)
    {
        $retweet = $request->user()->tweets()->create([
            'type' => TweetType::RETWEET,
            'original_tweet_id' => $tweet->id
        ]);

        broadcast(new TweetWasCreated($retweet));
        broadcast(new RetweetsWereUpdated($request->user(), $tweet));

        return response(null, 204);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet, Request $request)
    {
        broadcast(new TweetWasDeleted($tweet->retweetedTweet));

        $tweet
            ->retweetedTweet()
            ->where('user_id', $request->user()->id)
           // ->where('original_tweet_id', $tweet->id)
            ->delete();

        broadcast(new RetweetsWereUpdated($request->user(), $tweet));

        return response(null, 204);
    }
}
