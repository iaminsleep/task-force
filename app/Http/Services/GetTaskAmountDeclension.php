<?php

namespace App\Http\Services;

class GetTaskAmountDeclension {
  public function execute(int $amount) {
    if($amount === 1) {
        $amount = $amount.' задание';
    } 
    else if ($amount > 1 && $amount <= 4) {
        $amount = $amount.' задания';
    } 
    else {
        $amount = $amount.' заданий';
    }
    return $amount;
  }
}