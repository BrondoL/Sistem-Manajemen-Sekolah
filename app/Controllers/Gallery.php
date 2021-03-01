<?php

namespace App\Controllers;

class Gallery extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Gallery - SMA Jujutsu'
        ];
        return view('auth/gallery/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title'          => 'Gallery - SMA Jujutsu',
                'list'           => $this->gallery->list(),
                'jumlahfoto'     => $this->gallery->jumlahfoto(),
            ];
            $msg = [
                'data' => view('auth/gallery/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Gallery',
            ];
            $msg = [
                'data' => view('auth/gallery/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_gallery' => [
                    'label' => 'Nama Gallery',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_gallery'  => $validation->getError('nama_gallery'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nama_gallery'  => $this->request->getVar('nama_gallery'),
                    'slug_gallery'  => $this->request->getVar('slug_gallery'),
                    'sampul'        => $this->request->getVar('sampul'),
                    'tgl_gallery'   => $this->request->getVar('tgl_gallery'),
                    'user_id'       => $this->request->getVar('user_id'),
                ];

                $this->gallery->insert($simpandata);
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
            $gallery_id = $this->request->getVar('gallery_id');
            $list =  $this->gallery->find($gallery_id);
            $data = [
                'title'          => 'Edit Gallery',
                'gallery_id'     => $list['gallery_id'],
                'nama_gallery'   => $list['nama_gallery'],
            ];
            $msg = [
                'sukses' => view('auth/gallery/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_gallery' => [
                    'label' => 'Nama Gallery',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_gallery'  => $validation->getError('nama_gallery'),
                    ]
                ];
            } else {
                $updatedata = [
                    'nama_gallery'  => $this->request->getVar('nama_gallery'),
                    'slug_gallery'  => $this->request->getVar('slug_gallery'),
                    'tgl_gallery'   => $this->request->getVar('tgl_gallery'),
                    'user_id'       => $this->request->getVar('user_id'),
                ];

                $gallery_id = $this->request->getVar('gallery_id');
                $this->gallery->update($gallery_id, $updatedata);
                $msg = [
                    'sukses' => 'Gallery berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {

            $gallery_id = $this->request->getVar('gallery_id');
            //check
            $cekdata = $this->gallery->find($gallery_id);
            $fotolama = $cekdata['sampul'];
            if ($fotolama != 'default.png') {
                unlink('img/sampul/' . $fotolama);
                unlink('img/sampul/thumb/' . 'thumb_' . $fotolama);
            }

            $cekfoto = $this->foto->hapusfoto($gallery_id);
            foreach ($cekfoto as $cekfoto) {
                $oldfoto  = $cekfoto['nama_foto'];
                unlink('img/foto/' . $oldfoto);
                unlink('img/foto/thumb/' . 'thumb_' . $oldfoto);
            }



            $this->gallery->delete($gallery_id);
            $this->foto->hapusket($gallery_id);
            $msg = [
                'sukses' => 'Gallery Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function hapusall()
    {
        if ($this->request->isAJAX()) {
            $gallery_id = $this->request->getVar('gallery_id');
            $jmldata = count($gallery_id);
            for ($i = 0; $i < $jmldata; $i++) {
                //check
                $cekdata = $this->gallery->find($gallery_id[$i]);
                $fotolama = $cekdata['sampul'];
                if ($fotolama != 'default.png') {
                    unlink('img/sampul/' . $fotolama);
                    unlink('img/sampul/thumb/' . 'thumb_' . $fotolama);
                }

                $cekfoto = $this->foto->hapusfoto($gallery_id[$i]);
                foreach ($cekfoto as $cekfoto) {
                    $oldfoto  = $cekfoto['nama_foto'];
                    unlink('img/foto/' . $oldfoto);
                    unlink('img/foto/thumb/' . 'thumb_' . $oldfoto);
                }

                $this->gallery->delete($gallery_id[$i]);
                $this->foto->hapusket($gallery_id[$i]);
            }


            $msg = [
                'sukses' => "$jmldata Gallery berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }

    public function formupload()
    {
        if ($this->request->isAJAX()) {
            $gallery_id = $this->request->getVar('gallery_id');
            $list =  $this->gallery->find($gallery_id);
            $data = [
                'title' => 'Upload Sampul Gallery',
                'list'  => $list,
                'gallery_id' => $gallery_id
            ];
            $msg = [
                'sukses' => view('auth/gallery/upload', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function doupload()
    {
        if ($this->request->isAJAX()) {

            $gallery_id = $this->request->getVar('gallery_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'sampul' => [
                    'label' => 'Upload Sampul',
                    'rules' => 'uploaded[sampul]|mime_in[sampul,image/png,image/jpg,image/jpeg]|is_image[sampul]',
                    'errors' => [
                        'uploaded' => 'Masukkan gambar',
                        'mime_in' => 'Harus gambar!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'sampul' => $validation->getError('sampul')
                    ]
                ];
            } else {

                //check
                $cekdata = $this->gallery->find($gallery_id);
                $fotolama = $cekdata['sampul'];
                if ($fotolama != 'default.png') {
                    unlink('img/sampul/' . $fotolama);
                    unlink('img/sampul/thumb/' . 'thumb_' . $fotolama);
                }

                $filegambar = $this->request->getFile('sampul');

                $updatedata = [
                    'sampul' => $filegambar->getName()
                ];

                $this->gallery->update($gallery_id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(800, 533, 'center')
                    ->save('img/sampul/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('img/sampul');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formfoto()
    {
        if ($this->request->isAJAX()) {
            $gallery_id = $this->request->getVar('gallery_id');
            $foto = $this->foto->list($gallery_id);
            $list =  $this->gallery->find($gallery_id);
            $data = [
                'title' => 'Gallery -  ' . $list['nama_gallery'],
                'foto'  => $foto,
                'list'  => $list,
                'gallery_id' => $gallery_id
            ];
            $msg = [
                'sukses' => view('auth/gallery/foto', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function uploadfoto()
    {
        if ($this->request->isAJAX()) {

            $gallery_id = $this->request->getVar('gallery_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'ket_foto' => [
                    'label' => 'Keterangan Foto',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ]
                ],
                'nama_foto' => [
                    'label' => 'Upload Foto',
                    'rules' => 'uploaded[nama_foto]|mime_in[nama_foto,image/png,image/jpg,image/jpeg]|is_image[nama_foto]',
                    'errors' => [
                        'uploaded' => 'Masukkan foto!',
                        'mime_in' => 'Harus gambar!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'ket_foto' => $validation->getError('ket_foto'),
                        'nama_foto'     => $validation->getError('nama_foto')
                    ]
                ];
            } else {



                $filegambar = $this->request->getFile('nama_foto');

                $insertdata = [
                    'gallery_id' => $this->request->getVar('gallery_id'),
                    'ket_foto'   => $this->request->getVar('ket_foto'),
                    'nama_foto'       => $filegambar->getName(),
                ];

                $this->foto->insert($insertdata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(800, 533, 'center')
                    ->save('img/foto/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('img/foto');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapusfoto()
    {
        if ($this->request->isAJAX()) {

            $foto_id = $this->request->getVar('foto_id');
            //check
            $cekdata = $this->foto->find($foto_id);
            $fotolama = $cekdata['nama_foto'];
            if ($fotolama != 'default.png') {
                unlink('img/foto/' . $fotolama);
                unlink('img/foto/thumb/' . 'thumb_' . $fotolama);
            }
            $this->foto->delete($foto_id);
            $msg = [
                'sukses' => 'Foto berhasil dihapus!'
            ];

            echo json_encode($msg);
        }
    }
}
