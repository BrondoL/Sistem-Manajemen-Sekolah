<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelmapel extends Model
{
    protected $table      = 'mapel';
    protected $primaryKey = 'mapel_id';
    protected $allowedFields = ['nama_mapel'];

    //backend
    public function list()
    {
        return $this->table('mapel')
            ->orderBy('nama_mapel', 'ASC')
            ->get()->getResultArray();
    }
}
