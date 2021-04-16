<?php

namespace App\Jobs;

use App\Models\Tweet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class TweetMediaUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    protected $disk = 'spaces';
    protected $path;
    protected $tweetData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data, $path)
    {
        $this->data = $data;
        $this->path = $path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $targetPath = 'users/'.$this->data['user_id'].'/'.now().'.'.$this->data['extension'];
        $tempFile = Storage::get($this->path);
        $s3 = Storage::disk($this->disk);
        $s3->put($targetPath, $tempFile);
        $url = $s3->url($targetPath);
        $tweet = Tweet::create([
            'user_id' => $this->data['user_id'],
            'media_url' => $url
        ]);
    }
}
