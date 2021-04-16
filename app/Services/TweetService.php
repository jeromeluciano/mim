<?php

namespace App\Services;

use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use Illuminate\Support\Facades\Storage;

class MediaHandlerService {

  public function upload(TweetRequest $request)
  {
    



    // $path = Storage::disk('spaces')->put("public/uploads/{$userId}", $file);
    // $url = Storage::disk('spaces')->url($path);
    
  }

}