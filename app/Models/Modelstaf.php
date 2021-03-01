<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelstaf extends Model
{
    protected $table      = 'staf';
    protected $primaryKey = 'staf_id';
    protected $allowedFields = ['nip', 'nama', 'tmp_lahir', 'tgl_lahir', 'alamat', 'pendidikan', 'jabatan', 'foto'];

    public function published()
    {
        return $this->table('staf')
            ->orderBy('staf_id', 'ASC')
            ->limit(3)
            ->get()->getResultArray();
    }
    public function list()
    {
        return $this->table('staf')
            ->orderBy('staf_id', 'ASC')
            ->get()->getResultArray();
    }
}
