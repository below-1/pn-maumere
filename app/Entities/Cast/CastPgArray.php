<?php

namespace App\Entities\Cast;

use CodeIgniter\Entity\Cast\BaseCast;

class CastPgArray extends BaseCast {
  public static function get ($value, array $params = []) {
    // Remove start and end double quote
    helper('str_contains');
    $contents = substr($value, 1, -1);
    $contents = explode(',', $contents);
    $parsedContents = [];
    foreach ($contents as $token) {
      if (str_contains($token, ' ')) {
         array_push($parsedContents, substr($token, 1, -1));
      } else {
        array_push($parsedContents, $token);
      }
    }
    return $parsedContents;
  }

  public static function set ($value, array $params = []) {
    return '{' . implode(',', $value) . '}';
  }
}