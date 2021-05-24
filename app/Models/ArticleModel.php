<?php

namespace App\Models;
use CodeIgniter\Model;

class ArticleModel extends Model {
    protected $table = "article";
    protected $primaryKey = "id";
    protected $allowedFields = [
      'tags', 'content', 'title', 'description', 'slug', 'published', 'avatar'
    ];
    protected $returnType = 'App\Entities\Article';
}
