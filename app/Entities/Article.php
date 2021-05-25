<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Article extends Entity {

  protected $casts = [
    'id' => 'integer',
    'tags' => 'pgarray',
    'created_at' => 'timestamp',
    'updated_at' => 'timestamp',
    'content' => 'json'
  ];

  protected $castHandlers = [
    'pgarray' => 'App\Entities\Cast\CastPgArray'
  ];
}