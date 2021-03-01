<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpengumuman extends Model
{
    protected $table      = 'pengumuman';
    protected $primaryKey = 'pengumuman_id';
    protected $allowedFields = ['judul_pengumuman', 'isi_pengumuman', 'tanggal'];

    //backend
    public function list()
    {
        return $this->table('pengumuman')
            ->orderBy('judul_pengumuman', 'ASC')
            ->get()->getResultArray();
    }
}
