<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelgallery extends Model
{
    protected $table      = 'gallery';
    protected $primaryKey = 'gallery_id';
    protected $allowedFields = ['nama_gallery', 'slug_gallery', 'sampul', 'tgl_gallery', 'user_id'];

    //backend
    public function list()
    {
        return $this->table('gallery')
            ->join('user', 'user.user_id = gallery.user_id')
            ->orderBy('gallery_id', 'ASC')
            ->get()->getResultArray();
    }
    public function listjoin()
    {
        return $this->table('gallery')
            ->select('*')
            ->join('foto', 'foto.gallery_id = gallery.gallery_id', 'left')
            ->get()->getResultArray();
    }

    public function jumlahfoto()
    {
        return $this->table('gallery')
            ->select('*')
            ->selectCount('foto.gallery_id', 'jumlah_foto')
            ->join('foto', 'foto.gallery_id = gallery.gallery_id', 'left')
            ->join('user', 'user.user_id = gallery.user_id', 'left')
            ->groupBy('gallery.gallery_id')
            ->orderBy('gallery.gallery_id', 'asc')
            ->get()->getResultArray();
    }

    //frontend
    public function detail_gallery($id)
    {
        return $this->table('gallery')
            ->join('user', 'user.user_id = gallery.user_id')
            ->where('gallery_id', $id)
            ->get()->getRow();
    }

    public function published()
    {
        return $this->table('gallery')
            ->join('user', 'user.user_id = gallery.user_id')
            ->orderBy('gallery_id', 'ASC')
            ->limit(2)
            ->get()->getResultArray();
    }
}
