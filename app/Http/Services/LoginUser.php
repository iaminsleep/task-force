<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

class LoginUser {
  public function execute(array $data) {
    Auth::attempt($data);
  }
}