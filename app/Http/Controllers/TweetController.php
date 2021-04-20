<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Http\Requests\VideoTweetRequest;
use App\Jobs\TweetMediaUpload;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TweetController extends Controller
{
    
    public function create(TweetRequest $request)
    {
        $data = $request->only('attachment', 'caption');
        $file = $request->file('attachment');
        $mimeType = $file->getMimeType();
        $userId = auth()->guard('web')->user()->id;
        $path = $file->store('tmp_folder');
        
        $tweet = [
            'user_id' => $userId,
            'mime_type' => $mimeType,
            'extension' => $file->getClientOriginalExtension(),
        ];

        dispatch(new TweetMediaUpload($tweet, $path));
        
        return response()->json(200);
    }

    public function videoTweet(VideoTweetRequest $request)
    {
        $data = $request->only('media_streamable_url', 'mime_type');
        $data['user_id'] = auth('web')->id();

        $tweet = Tweet::create($data);
        return response()->json($tweet, 200);
    }

    public function index()
    {
        $tweets = Tweet::with('user')->get()->reverse()->values();
        return response()->json(compact('tweets'), 200);
    }

    public function like(Request $request, Tweet $tweet)
    {
        $tweet->toggleLike();
        return response()->json($tweet, 200);
    }


    public function trendings()
    {
        return Tweet::trendings()->all();
    }
}
