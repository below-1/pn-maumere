<?php

namespace App\Models;
use CodeIgniter\Model;

class MediaModel extends Model {
    protected $table = "media";
    protected $primaryKey = "id";
    protected $allowedFields = [
      'tags', 'metadata', 'tipe', 'url'
    ];
    protected $returnType = 'App\Entities\Media';
}
