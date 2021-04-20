<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class AvatarUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $disk = 'spaces';
    protected $data;
    protected $path;
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
        $targetPath = 'avatars/'.$this->data['user_id'].'/'.now().'.'.$this->data['extension'];
        $tempFile = Storage::get($this->path);
        $s3 = Storage::disk($this->disk);
        $s3->put($targetPath, $tempFile);
        $url = $s3->url($targetPath);
        $user = User::find($this->data['user_id']);
        $user->update([
            'avatar_url' => $url
        ]);


    }
}
