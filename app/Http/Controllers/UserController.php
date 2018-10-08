<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laraquick\Controllers\Traits\Api;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\User;

use Hash;

class UserController extends Controller
{
  use Api;
  
  protected function model() {
    return User::class;
  }
  
  protected function validationRules(array $data, $id = null) {
    return [
      'name' => 'required|string|max:50',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:6'
    ];
  }

  protected function beforeStore(array &$data)
  {
    $data['password'] = Hash::make($data['password']);
  }

  public function posts($userId)
  {
    $user = User::find($userId);
    if (!$user) {
      return $this->error('User Not Known',null, 404);
    }
    $posts = $user->posts()->simplePaginate(6);
    return $this->paginatedList($posts->toArray());
  }


}
