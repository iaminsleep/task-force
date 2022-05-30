<?php

namespace App\Http\Services;

use App\Models\User;

use Carbon\Carbon;

class RegisterUser {
  public function execute(array $data) : User {
    $user = new User();

    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = $data['password'];
    $user->city_id = $data['city_id'];
    $user->created_at = Carbon::now();

    $user->save();

    return $user;
  }
}