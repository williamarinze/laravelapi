<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Laraquick\Controllers\Traits\Api;

use App\Post;

class PostController extends Controller
{
    
  use Api;

  public function model() {
    return Post::class;
  }

  public function validationRules(array $data, $id = null) {
    return [
      'title' => 'required|string',
      'body' => 'required|string',
    ];
  }
   
}
