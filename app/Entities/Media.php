<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Media extends Entity {
  protected $casts = [
    'id' => 'integer',
    'tags' => 'array',
    'metadata' => 'json'
  ];
}