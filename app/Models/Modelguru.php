<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelguru extends Model
{
    protected $table      = 'guru';
    protected $primaryKey = 'guru_id';
    protected $allowedFields = ['nip', 'nama', 'tmp_lahir', 'tgl_lahir', 'mapel_id', 'pendidikan', 'alamat', 'foto'];

    //backend
    public function list()
    {
        return $this->table('guru')
            ->join('mapel', 'mapel.mapel_id = guru.mapel_id')
            ->orderBy('guru_id', 'ASC')
            ->get()->getResultArray();
    }
}
