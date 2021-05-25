<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Sidang extends Entity {
  protected $casts = [
    'id' => 'integer',
    'waktu' => 'datetime',
    'penggugat' => 'pgarray',
    'tergugat' => 'pgarray',
    'metadata' => 'object'
  ];
  protected $castHandlers = [
    'pgarray' => 'App\Entities\Cast\CastPgArray'
  ];
}