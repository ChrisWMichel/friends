<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class TweetMedia extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded  = [];

    public function baseMedia(){
        return $this->belongsTo(Media::class, 'media_id');
    }


}
