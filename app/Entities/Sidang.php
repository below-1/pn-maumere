<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Sidang extends Entity {
  protected $casts = [
    'id' => 'integer',
    'waktu' => 'timestamp',
    'penggugat' => 'array',
    'tergugat' => 'array',
    'metadata' => 'object'
  ];
}