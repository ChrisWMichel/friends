<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/timeline', 'Api\Timeline\TimelineController@index');
Route::post('/tweets', 'Api\Tweets\TweetController@store');

Route::post('/tweets/{tweet}/likes', 'Api\Tweets\TweetLikeController@store');
Route::delete('/tweets/{tweet}/likes', 'Api\Tweets\TweetLikeController@destroy');

Route::post('/tweets/{tweet}/replies', 'Api\Tweets\TweetReplyController@store');

Route::post('/tweets/{tweet}/retweets', 'Api\Tweets\RetweetsController@store');
Route::delete('/tweets/{tweet}/retweets', 'Api\Tweets\RetweetsController@destroy');

Route::post('/tweets/{tweet}/quotes', 'Api\Tweets\TweetQuoteController@store');

Route::post('/media', 'Api\Media\MediaController@store');
Route::get('/media/types', 'Api\Media\MediaTypeController@index');
