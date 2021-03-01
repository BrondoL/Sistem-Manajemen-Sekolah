<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelfoto extends Model
{
    protected $table      = 'foto';
    protected $primaryKey = 'foto_id';
    protected $allowedFields = ['ket_foto', 'nama_foto', 'gallery_id'];

    //backend
    public function list($gallery_id)
    {
        return $this->table('foto')
            ->where('gallery_id', $gallery_id)
            ->orderBy('foto_id', 'ASC')
            ->get()->getResultArray();
    }

    public function hapusfoto($gallery_id)
    {
        return $this->table('foto')
            ->where('gallery_id', $gallery_id)
            ->get()->getResultArray();
    }

    public function hapusket($gallery_id)
    {
        return $this->table('foto')
            ->where('gallery_id', $gallery_id)
            ->delete();
    }

    public function detail_foto($id)
    {
        return $this->table('foto')
            ->where('gallery_id', $id)
            ->orderBy('foto_id', 'ASC')
            ->get()->getResultArray();
    }
}
