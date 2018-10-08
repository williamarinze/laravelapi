<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
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
      'post_id'=> 'required|integer|exists:posts,id',
      'user_id'=>'required|integer|exists:users,id',

    ];
  }

 public function beforeStoreResponse(Model &$data)
  {
    $data->user()->associate(request()->user());

  }
}
