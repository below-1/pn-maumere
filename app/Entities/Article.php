<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\Entity\Cast\BaseCast;

class CastPgArray extends BaseCast {
  public static function get ($value, array $params = []) {
    $contents = substr($value, 1, strlen($value) - 1);
    return explode(',', $contents);
  }

  public static function set ($value, array $params = []) {
    return '{' . implode(',', $value) . '}';
  }
}

class Article extends Entity {
  protected $casts = [
    'id' => 'integer',
    'tags' => 'pgarray',
    'created_at' => 'timestamp',
    'updated_at' => 'timestamp',
    'content' => 'json'
  ];

  protected $castHandlers = [
    'pgarray' => 'App\Entities\CastPgArray'
  ];
}