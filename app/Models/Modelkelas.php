<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkelas extends Model
{
    protected $table      = 'kelas';
    protected $primaryKey = 'kelas_id';
    protected $allowedFields = ['nama_kelas', 'guru_id'];

    //backend
    public function list()
    {
        return $this->table('kelas')
            ->orderBy('nama_kelas', 'ASC')
            ->get()->getResultArray();
    }

    public function listjoin()
    {
        return $this->table('kelas')
            ->join('guru', 'guru.guru_id = kelas.guru_id')
            ->orderBy('kelas_id', 'ASC')
            ->get()->getResultArray();
    }
}
