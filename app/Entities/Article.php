<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Article extends Entity {
  protected $casts = [
    'id' => 'integer',
    'tags' => 'array',
    'metadata' => 'json',
    'created_at' => 'timestamp',
    'updated_at' => 'timestamp',
    'content' => 'array'
  ];
}