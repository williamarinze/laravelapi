<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Laraquick\Controllers\Traits\Api;

use App\Comment;

class CommentController extends Controller
{
    use Api;

  public function model() {
    return Comment::class;
  }

  public function validationRules(array $data, $id = null) {
    return [
      'content' => 'required|string',
    ];
  }
  public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('content');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post/id'));
        $post->comments()->save($comment);

        return back();
    }
}
