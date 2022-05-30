<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Log;

use App\Models\User;

class LogRegisterUser extends RegisterUser {
  public function execute(array $data) : User {
    Log::info('A new user has been registered: ' . $data['email']);

    return parent::execute($data);
  }
}