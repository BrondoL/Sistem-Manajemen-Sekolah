<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelberita extends Model
{
    protected $table      = 'berita ';
    protected $primaryKey = 'berita_id';
    protected $allowedFields = ['judul_berita', 'slug_berita', 'isi', 'gambar', 'tgl_berita', 'status', 'kategori_id', 'user_id'];

    //backend
    public function list()
    {
        return $this->table('berita')
            ->join('user', 'user.user_id = berita.user_id')
            ->join('kategori', 'kategori.kategori_id = berita.kategori_id')
            ->orderBy('berita_id', 'ASC')
            ->get()->getResultArray();
    }
    //frontend
    public function published()
    {
        return $this->table('berita')
            ->join('user', 'user.user_id = berita.user_id')
            ->join('kategori', 'kategori.kategori_id = berita.kategori_id')
            ->where('status', 'published')
            ->orderBy('berita_id', 'ASC')
            ->limit(3)
            ->get()->getResultArray();
    }

    public function detail_berita($slug_berita)
    {
        return $this->table('berita')
            ->join('user', 'user.user_id = berita.user_id')
            ->join('kategori', 'kategori.kategori_id = berita.kategori_id')
            ->where('slug_berita', $slug_berita)
            ->get()->getRow();
    }
}
