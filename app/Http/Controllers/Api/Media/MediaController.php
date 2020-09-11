<?php

namespace App\Http\Controllers\Api\Media;

use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaStoreRequest;
use App\Models\TweetMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaStoreRequest $request)
    {

        $result = collect($request->media)->map(function ($media){
            return $this->addMedia($media);
        });
    }

    protected function addMedia($media){
        $tweetMedia = TweetMedia::create([]);

        $tweetMedia->baseMedia()
            ->associate($tweetMedia->addMedia($media)->toMediaCollection())
            ->save();

        return $tweetMedia;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
