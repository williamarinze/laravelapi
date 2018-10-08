<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use Laraquick\Controllers\Traits\Api;

use App\Post;

class PostController extends Controller
{
    
  use Api;

  public function model() {
    return Post::class;
  }

  public function showModel()
  {
    return Post::with('comments');
  }

  public function validationRules(array $data, $id = null) {
    return [
      'title' => 'required|string',
      'body' => 'required|string',


    ];
  }

  protected function beforeStore(array &$data)
  {
    $data['user_id'] = Auth::user($data['user_id']);
    
  }
}

