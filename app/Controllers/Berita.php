<?php

namespace App\Controllers;

class Berita extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Berita - SMA Jujutsu'
        ];
        return view('auth/berita/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Berita - SMA Jujutsu',
                'list' => $this->berita->list()


            ];
            $msg = [
                'data' => view('auth/berita/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Berita',
                'kategori' => $this->kategori->orderBy('nama_kategori', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/berita/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'judul_berita' => [
                    'label' => 'Judul berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kategori_id' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'isi' => [
                    'label' => 'Isi Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'judul_berita'  => $validation->getError('judul_berita'),
                        'kategori_id'   => $validation->getError('kategori_id'),
                        'isi'           => $validation->getError('isi'),
                        'status'        => $validation->getError('status'),
                    ]
                ];
            } else {
                $simpandata = [
                    'judul_berita'  => $this->request->getVar('judul_berita'),
                    'slug_berita'   => $this->request->getVar('slug_berita'),
                    'kategori_id'   => $this->request->getVar('kategori_id'),
                    'isi'           => $this->request->getVar('isi'),
                    'status'        => $this->request->getVar('status'),
                    'gambar'        => $this->request->getVar('gambar'),
                    'tgl_berita'    => $this->request->getVar('tgl_berita'),
                    'user_id'       => $this->request->getVar('user_id'),
                ];

                $this->berita->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $berita_id = $this->request->getVar('berita_id');
            $list =  $this->berita->find($berita_id);
            $kategori =  $this->kategori->list();
            $data = [
                'title'         => 'Edit Berita',
                'kategori'      => $kategori,
                'berita_id'     => $list['berita_id'],
                'judul_berita'  => $list['judul_berita'],
                'kategori_id'   => $list['kategori_id'],
                'isi'           => $list['isi'],
                'status'        => $list['status'],
            ];
            $msg = [
                'sukses' => view('auth/berita/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'judul_berita' => [
                    'label' => 'Judul berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kategori_id' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'isi' => [
                    'label' => 'Isi Berita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'judul_berita'  => $validation->getError('judul_berita'),
                        'kategori_id'   => $validation->getError('kategori_id'),
                        'isi'           => $validation->getError('isi'),
                        'status'        => $validation->getError('status'),
                    ]
                ];
            } else {
                $updatedata = [
                    'judul_berita'  => $this->request->getVar('judul_berita'),
                    'slug_berita'   => $this->request->getVar('slug_berita'),
                    'kategori_id'   => $this->request->getVar('kategori_id'),
                    'isi'           => $this->request->getVar('isi'),
                    'status'        => $this->request->getVar('status'),
                    'tgl_berita'    => $this->request->getVar('tgl_berita'),
                    'user_id'       => $this->request->getVar('user_id'),
                ];

                $berita_id = $this->request->getVar('berita_id');
                $this->berita->update($berita_id, $updatedata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {

            $berita_id = $this->request->getVar('berita_id');
            //check
            $cekdata = $this->berita->find($berita_id);
            $fotolama = $cekdata['gambar'];
            if ($fotolama != 'default.png') {
                unlink('img/berita/' . $fotolama);
                unlink('img/berita/thumb/' . 'thumb_' . $fotolama);
            }
            $this->berita->delete($berita_id);
            $msg = [
                'sukses' => 'Data Guru Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function hapusall()
    {
        if ($this->request->isAJAX()) {
            $berita_id = $this->request->getVar('berita_id');
            $jmldata = count($berita_id);
            for ($i = 0; $i < $jmldata; $i++) {
                //check
                $cekdata = $this->berita->find($berita_id[$i]);
                $fotolama = $cekdata['gambar'];
                if ($fotolama != 'default.png') {
                    unlink('img/berita/' . $fotolama);
                    unlink('img/berita/thumb/' . 'thumb_' . $fotolama);
                }
                $this->berita->delete($berita_id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }

    public function formupload()
    {
        if ($this->request->isAJAX()) {
            $berita_id = $this->request->getVar('berita_id');
            $list =  $this->berita->find($berita_id);
            $data = [
                'title' => 'Upload Sampul Berita',
                'list'  => $list,
                'berita_id' => $berita_id
            ];
            $msg = [
                'sukses' => view('auth/berita/upload', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function doupload()
    {
        if ($this->request->isAJAX()) {

            $berita_id = $this->request->getVar('berita_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'gambar' => [
                    'label' => 'Upload Gambar',
                    'rules' => 'uploaded[gambar]|mime_in[gambar,image/png,image/jpg,image/jpeg]|is_image[gambar]',
                    'errors' => [
                        'uploaded' => 'Masukkan gambar',
                        'mime_in' => 'Harus gambar!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'gambar' => $validation->getError('gambar')
                    ]
                ];
            } else {

                //check
                $cekdata = $this->berita->find($berita_id);
                $fotolama = $cekdata['gambar'];
                if ($fotolama != 'default.png') {
                    unlink('img/berita/' . $fotolama);
                    unlink('img/berita/thumb/' . 'thumb_' . $fotolama);
                }

                $filegambar = $this->request->getFile('gambar');

                $updatedata = [
                    'gambar' => $filegambar->getName()
                ];

                $this->berita->update($berita_id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(250, 250, 'center')
                    ->save('img/berita/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('img/berita');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!'
                ];
            }
            echo json_encode($msg);
        }
    }




    //Start kategori (backend)
    public function kategori()
    {
        $data = [
            'title' => 'Kategori - Berita'
        ];
        return view('auth/kategori/index', $data);
    }

    public function getkategori()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Kategori - Berita',
                'list' => $this->kategori->orderBy('kategori_id', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/kategori/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formkategori()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Kategori'
            ];
            $msg = [
                'data' => view('auth/kategori/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpankategori()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kategori' => [
                    'label' => 'Kategori',
                    'rules' => 'required|is_unique[kategori.nama_kategori]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kategori' => $validation->getError('nama_kategori'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nama_kategori' => $this->request->getVar('nama_kategori'),
                    'slug_kategori' => $this->request->getVar('slug_kategori'),
                ];

                $this->kategori->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formeditkategori()
    {
        if ($this->request->isAJAX()) {
            $kategori_id = $this->request->getVar('kategori_id');
            $list =  $this->kategori->find($kategori_id);
            $data = [
                'title'           => 'Edit Kategori',
                'kategori_id'     => $list['kategori_id'],
                'nama_kategori'   => $list['nama_kategori'],
            ];
            $msg = [
                'sukses' => view('auth/kategori/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatekategori()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kategori' => [
                    'label' => 'Nama Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kategori' => $validation->getError('nama_kategori'),
                    ]
                ];
            } else {
                $updatedata = [
                    'nama_kategori' => $this->request->getVar('nama_kategori'),
                    'slug_kategori' => $this->request->getVar('slug_kategori'),
                ];

                $kategori_id = $this->request->getVar('kategori_id');
                $this->kategori->update($kategori_id, $updatedata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapuskategori()
    {
        if ($this->request->isAJAX()) {

            $kategori_id = $this->request->getVar('kategori_id');

            $this->kategori->delete($kategori_id);
            $msg = [
                'sukses' => 'Kategori Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }
    //end kategori
}
