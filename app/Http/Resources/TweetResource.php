<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'type' => $this->type,
            'original_tweet' => new TweetResource($this->originalTweet),
            'like_cnt' => $this->likes->count(),
            'retweet_cnt' => $this->retweets->count(),
            'user' => new UserResource($this->user),
            'media' => new MediaCollection($this->media),
            'replies_cnt' => $this->replies->count(),
            //'created_at' => Carbon::parse($this->created_at)->diffForHumans(null, true). ' ago',
            'created_at' => $this->created_at->timestamp,
            'diffForHumans' => $this->created_at
        ];
    }
}
