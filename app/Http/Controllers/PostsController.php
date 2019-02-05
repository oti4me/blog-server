<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use \Firebase\JWT\JWT;
use App\Helpers\AuthHelpers;
use Illuminate\Contracts\Auth\Guard;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth){ 
      $this->user = $auth->user(); 
    }

    /**
     * Create a new post.
     *
     * @return {object} response
     */
    public function add(Request $request) {
      
      $this->validate($request, Post::$validatePost);
      
      
      $postDetails = [
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'content' => $request->input('content'),
        'user_id' => 1,
        'image' => $request->input('image'),
      ];
      
      $post = Post::where('title', $request->input('title'))
        ->where('user_id', $postDetails['user_id'])
        ->first();

      if($post) {
        return response()->json(['Message' => 'You already have a post with this title'], 409);
      }

      $post = Post::create($postDetails);

      return response()->json(['Message' => 'Post added successfully', 'post' => $post], 201);
    }
}
