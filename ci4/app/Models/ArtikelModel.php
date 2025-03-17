<?php

namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'created_at'];

    public function getLatestArticles($limit = 5)
    {
        return $this->orderBy('created_at', 'DESC')->limit($limit)->findAll();
    }
}

