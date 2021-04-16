<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
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
        // dd(Storage::get($tweet['path']));
        dispatch(new TweetMediaUpload($tweet, $path));
        
        // $file = Storage::get($tweet['path']);
        // $cloudPath = Storage::disk('spaces')->put($targetPath, $file);
        return response()->json(200);
        // dispatch(new TweetMediaUpload($tweet));
    }

    public function index()
    {
        $tweets = Tweet::with('user')->get();
        return response()->json(compact('tweets'), 200);
    }

}
