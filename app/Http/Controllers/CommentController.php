<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $data = $request->only('message', 'tweet_id');
        $data['user_id'] = auth('web')->id();

        $comment = Comment::create($data);
        $comment->load('user');
        if (!$comment) {
            return response(422);
        }
        return response()->json($comment, 200);
    }
}
