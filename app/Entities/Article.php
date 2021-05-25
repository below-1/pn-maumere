<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Article extends Entity {

  protected $casts = [
    'id' => 'integer',
    'tags' => 'pgarray',
    'content' => 'json'
  ];

  protected $castHandlers = [
    'pgarray' => 'App\Entities\Cast\CastPgArray'
  ];
}