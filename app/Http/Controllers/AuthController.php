<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\AvatarRequest;
use App\Http\Requests\UserRequest;
use App\Jobs\AvatarUpload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    
    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            return response()->json(Auth::user(), 200);
        }

        return response()->json(['status' => 'These credentials dont exist in our database'], 401);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(null, 200);
    }

    public function tweets(User $user)
    {
        $tweets = $user->tweets()->with('user')->get()->reverse()->values();
        return response()->json(compact('tweets'), 200);
    }

    public function user(Request $request, User $user)
    {
        return response()->json($user, 200);
    }

    public function register(UserRequest $request) {
        $credentials = $request->only('name', 'password', 'email');
        $credentials['password'] = Hash::make($credentials['password']);

        if ($user = User::create($credentials)) {
            auth()->guard('web')->login($user);
            return response()->json(['status' => 'success', 'user' => $user], 200);
        }
        
        return response(401);
    }

    public function avatar(AvatarRequest $request)
    {
        $data = $request->only('avatar');
        $file = $request->file('avatar');
        $mimeType = $file->getMimeType();
        $userId = auth()->guard('web')->user()->id;
        $path = $file->store('avatars');
        
        $generatedFileName = Str::uuid().'.'.$file->getClientOriginalExtension();
        // Image::make($file->getRealPath())->resize(null, 150, function($constraint) {
        //     $constraint->aspectRatio();
        // })->save(public_path($generatedFileName));
        Image::make($file->getRealPath())->fit(150)->save(public_path($generatedFileName));

        $avatar = [
            'user_id' => $userId,
            'mime_type' => $mimeType,
            'extension' => $file->getClientOriginalExtension(),
        ];

        $targetPath = 'avatars/'.$avatar['user_id'].'/'.now().'.'.$avatar['extension'];
       
        // $targetPath = 'avatars/'.$avatar['user_id'].'/'.now().'.'.$avatar['extension'];
        $tempFile = Storage::disk('public')->get($generatedFileName);
        $s3 = Storage::disk('spaces');
        $s3->put($targetPath, $tempFile);
        $url = $s3->url($targetPath);
        $user = User::find($avatar['user_id']);

        $user->update([
            'avatar_url' => $url
        ]);

        // dispatch(new AvatarUpload($avatar, $path));

        return response()->json(['status' => 200, 'avatar_url' => $url],200);
    }

}
