<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Media extends Entity {
  protected $casts = [
    'id' => 'integer',
    'tags' => 'pgarray',
    'metadata' => 'json'
  ];

  protected $castHandlers = [
    'pgarray' => 'App\Entities\Cast\CastPgArray'
  ];
}