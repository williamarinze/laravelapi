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
}
