<?php

namespace App\Entities\Cast;

use CodeIgniter\Entity\Cast\BaseCast;

class CastPgArray extends BaseCast {
  public static function get ($value, array $params = []) {
    $contents = substr($value, 1, -1);
    return explode(',', $contents);
  }

  public static function set ($value, array $params = []) {
    return '{' . implode(',', $value) . '}';
  }
}