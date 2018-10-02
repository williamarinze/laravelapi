<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laraquick\Controllers\Traits\Api;

use App\User;

class UserController extends Controller
{
     use Api;
  
  protected function model() {
    return User::class;
  }
  
 
  protected function validationRules(array $data, $id = null) {
    return [
      'name' => 'required|string|max:50',
      'email' => 'sometimes|email',
      'password' => 'required|password'
    ];
  }
}
