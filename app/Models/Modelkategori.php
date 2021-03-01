<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkategori extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'kategori_id';
    protected $allowedFields = ['nama_kategori', 'slug_kategori'];

    //backend
    public function list()
    {
        return $this->table('kategori')
            ->orderBy('nama_kategori', 'ASC')
            ->get()->getResultArray();
    }
}
