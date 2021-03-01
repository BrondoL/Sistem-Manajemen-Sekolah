<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkonfigurasi extends Model
{
    protected $table      = 'konfigurasi';
    protected $primaryKey = 'konfigurasi_id';
    protected $allowedFields = ['nama_web', 'deskripsi', 'visi', 'misi', 'instagram', 'facebook', 'whatsapp', 'email', 'alamat', 'logo', 'icon'];

    //backend
    public function list()
    {
        return $this->table('konfigurasi')
            ->orderBy('konfigurasi_id', 'ASC')
            ->get()->getResultArray();
    }
}
