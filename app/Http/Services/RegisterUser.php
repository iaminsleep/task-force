<?php

namespace App\Http\Services;

use App\Models\User;

class RegisterUser {
  public function execute(array $data) : User {
    $user = User::create($data);

    return $user;
  }
}
