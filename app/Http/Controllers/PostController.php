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
      'user_id'=>'required|integer',
      'title' => 'required|string',
      'body' => 'required|string',
    ];
  }
   public function beforeStoreResponse(Model &$data)
  {
    $data->user()->associate(request()->user());

  }
}
