<?php

namespace App\Models;
use CodeIgniter\Model;

class SidangModel extends Model {
    protected $table = "sidang";
    protected $primaryKey = "id";
    protected $allowedFields = [
      'nomor', 'waktu', 'ruangan', 'penggugat', 'tergugat', 'agenda'
    ];
    protected $returnType = 'App\Entities\Sidang';
}
