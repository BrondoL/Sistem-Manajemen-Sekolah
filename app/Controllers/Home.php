<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$staf = $this->staf->selectCount('staf_id')->first();
		$guru = $this->guru->selectCount('guru_id')->first();
		$siswa = $this->siswa->selectCount('siswa_id')->first();
		$kelas = $this->kelas->selectCount('kelas_id')->first();
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$berita = $this->berita->published();
		$list_staf = $this->staf->published();
		$gallery = $this->gallery->published();
		$kategori = $this->kategori->list();
		$data = [
			'title' => 'SMA Jujutsu - Selamat Datang!',
			'staf' => $staf,
			'guru' => $guru,
			'siswa' => $siswa,
			'kelas' => $kelas,
			'konfigurasi' => $konfigurasi,
			'berita' => $berita,
			'list_staf' => $list_staf,
			'gallery' => $gallery,
			'kategori' => $kategori,
		];
		return view('front/layout/menu', $data);
	}

	public function detail_berita($slug_berita = null)
	{
		if (!isset($slug_berita)) return redirect()->to('/home#berita');
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$berita = $this->berita->detail_berita($slug_berita);
		$kategori = $this->kategori->list();
		if ($berita) {
			$data = [
				'title'  => 'Berita - ' . $berita->judul_berita,
				'konfigurasi' => $konfigurasi,
				'berita' => $berita,
				'kategori' => $kategori,
			];
			return view('front/berita/detail', $data);
		} else {
			return redirect()->to('/home#berita');
		}
	}

	public function detail_gallery($id = null)
	{
		if (!isset($id)) return redirect()->to('/home#gallery');
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$gallery = $this->gallery->detail_gallery($id);
		$list_foto = $this->foto->detail_foto($id);
		$kategori = $this->kategori->list();
		if ($gallery) {
			$data = [
				'title'  => 'Gallery - ' . $gallery->nama_gallery,
				'konfigurasi' => $konfigurasi,
				'gallery' => $gallery,
				'list_foto' => $list_foto,
				'kategori' => $kategori,
			];
			return view('front/gallery/detail', $data);
		} else {
			return redirect()->to('/home#gallery');
		}
	}

	public function cekspp()
	{
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$kategori = $this->kategori->list();
		$data = [
			'title' => 'Cek SPP - SMA Jujutsu',
			'konfigurasi' => $konfigurasi,
			'kategori' => $kategori,
		];
		return view('front/spp/list', $data);
	}

	public function searchspp()
	{
		$keyword  = $this->request->getVar('keyword');
		if (!isset($keyword)) return redirect()->to('cekspp');
		$check = $this->spp->get_spp_keyword($keyword);
		if ($check) {

			$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
			$kategori = $this->kategori->list();
			$data = [
				'title' => 'Cek SPP - SMA Jujutsu',
				'konfigurasi' => $konfigurasi,
				'kategori' => $kategori,
				'spp'	=> $check,
			];
			return view('front/spp/search', $data);
		} else {
			session()->setFlashdata('alert', 'Nis yang anda masukkan tidak terdaftar!');
			return redirect()->to('cekspp');
		}
	}

	public function kelulusan()
	{
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$kategori = $this->kategori->list();
		$data = [
			'title' => 'Pengumuman Kelulusan - SMA Jujutsu',
			'konfigurasi' => $konfigurasi,
			'kategori' => $kategori,
		];
		return view('front/kelulusan/list', $data);
	}

	public function searchkelulusan()
	{
		$keyword  = $this->request->getVar('keyword');
		if (!isset($keyword)) return redirect()->to('kelulusan');
		$check = $this->kelulusan->get_kelulusan_keyword($keyword);
		if ($check) {
			$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
			$kategori = $this->kategori->list();
			$data = [
				'title' => 'Pengumuman Kelulusan - SMA Jujutsu',
				'konfigurasi' => $konfigurasi,
				'kategori' => $kategori,
				'kelulusan'	=> $check,
			];
			return view('front/kelulusan/search', $data);
		} else {
			session()->setFlashdata('alert', 'No. ujian yang anda masukkan tidak terdaftar!');
			return redirect()->to('kelulusan');
		}
	}

	public function staf()
	{
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$kategori = $this->kategori->list();
		$data = [
			'title' => 'List Staf - SMA Jujutsu',
			'konfigurasi' => $konfigurasi,
			'kategori' => $kategori,
			'list_staf' => $this->staf->paginate(3, 'staf'),
			'pager' => $this->staf->pager
		];
		return view('front/tenagapendidik/staf', $data);
	}

	public function guru()
	{
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$kategori = $this->kategori->list();
		$data = [
			'title' => 'List Guru - SMA Jujutsu',
			'konfigurasi' => $konfigurasi,
			'kategori' => $kategori,
			'list_guru' => $this->guru->join('mapel', 'mapel.mapel_id = guru.mapel_id')->paginate(3, 'guru'),
			'pager' => $this->guru->pager
		];
		return view('front/tenagapendidik/guru', $data);
	}

	public function gallery()
	{
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$kategori = $this->kategori->list();
		$data = [
			'title' => 'List Gallery - SMA Jujutsu',
			'konfigurasi' => $konfigurasi,
			'kategori' => $kategori,
			'list_gallery' => $this->gallery->paginate(4, 'gallery'),
			'pager' => $this->gallery->pager
		];
		return view('front/gallery/list', $data);
	}

	public function berita()
	{
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$kategori = $this->kategori->list();
		$data = [
			'title' => 'List Berita - SMA Jujutsu',
			'konfigurasi' => $konfigurasi,
			'kategori' => $kategori,
			'list_berita' => $this->berita
				->join('user', 'user.user_id = berita.user_id')
				->join('kategori', 'kategori.kategori_id = berita.kategori_id')
				->paginate(3, 'berita'),
			'pager' => $this->berita->pager
		];
		return view('front/berita/list', $data);
	}
}
