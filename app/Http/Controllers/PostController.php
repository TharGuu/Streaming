<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        Post::create([
            'title'   => 'default', // if title column exists
            'body'    => $request->body,
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}