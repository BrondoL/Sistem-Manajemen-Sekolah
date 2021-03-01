<?php

namespace App\Controllers;

use Config\Services;

class Ppdb extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = [
            'title' => 'Pendaftaran - SMA Jujutsu',
        ];
        return view('ppdb/daftar/list', $data);
    }

    public function simpan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nisn' => [
                    'label' => 'Nisn',
                    'rules' => 'required|is_unique[ppdb.nisn]|min_length[5]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah tersedia.',
                        'min_length' => '{field} minimal 5',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_lengkap' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tgl_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tmp_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'agama' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'asal_sekolah' => [
                    'label' => 'Asal Sekolah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_ayah' => [
                    'label' => 'Nama Ayah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_ibu' => [
                    'label' => 'Nama Ibu',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jenis_tinggal' => [
                    'label' => 'Jenis Tinggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'transportasi' => [
                    'label' => 'Transportasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'no_telp' => [
                    'label' => 'No Telp',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jurusan' => [
                    'label' => 'Jurusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nisn' => $validation->getError('nisn'),
                        'password' => $validation->getError('password'),
                        'nama_lengkap' => $validation->getError('nama_lengkap'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'tmp_lahir' => $validation->getError('tmp_lahir'),
                        'jenkel' => $validation->getError('jenkel'),
                        'agama' => $validation->getError('agama'),
                        'asal_sekolah' => $validation->getError('asal_sekolah'),
                        'jenis_tinggal' => $validation->getError('jenis_tinggal'),
                        'nama_ayah' => $validation->getError('nama_ayah'),
                        'nama_ibu' => $validation->getError('nama_ibu'),
                        'transportasi' => $validation->getError('transportasi'),
                        'alamat' => $validation->getError('alamat'),
                        'no_telp' => $validation->getError('no_telp'),
                        'jurusan' => $validation->getError('jurusan'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nisn' => $this->request->getVar('nisn'),
                    'password' => (password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)),
                    'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'tmp_lahir' => $this->request->getVar('tmp_lahir'),
                    'jenkel' => $this->request->getVar('jenkel'),
                    'agama' => $this->request->getVar('agama'),
                    'nama_ayah' => $this->request->getVar('nama_ayah'),
                    'nama_ibu' => $this->request->getVar('nama_ibu'),
                    'alamat' => $this->request->getVar('alamat'),
                    'jenis_tinggal' => $this->request->getVar('jenis_tinggal'),
                    'asal_sekolah' => $this->request->getVar('asal_sekolah'),
                    'transportasi' => $this->request->getVar('transportasi'),
                    'no_telp' => $this->request->getVar('no_telp'),
                    'jurusan' => $this->request->getVar('jurusan'),
                    'foto_siswa' => $this->request->getVar('foto_siswa'),
                    'foto_ijazah' => $this->request->getVar('foto_ijazah'),
                    'tgl_daftar' => $this->request->getVar('tgl_daftar'),
                    'status' => $this->request->getVar('status'),
                ];

                $this->ppdb->insert($simpandata);
                session()->setFlashdata('pesan', 'Jangan lupa mengganti password!');
                $msg = [
                    'sukses' => 'Data berhasil dikirim!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function login()
    {
        if (session('login')) {
            session()->setFlashdata('pesan_gagal', 'Anda sudah login!');
            return redirect()->to('/ppdb/profile');
        }
        $data = [
            'title' => 'Login PPDB - SMA Jujutsu',
        ];
        return view('ppdb/login/login', $data);
    }

    public function validasi()
    {
        if ($this->request->isAJAX()) {
            $nisn = $this->request->getVar('nisn');
            $password = $this->request->getVar('password');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nisn' => [
                    'label' => 'Nisn',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nisn' => $validation->getError('nisn'),
                        'password' => $validation->getError('password')
                    ]
                ];
            } else {

                //cek user
                $query_cekuser = $this->db->query("SELECT * FROM ppdb WHERE nisn='$nisn'");

                $result = $query_cekuser->getResult();

                if (count($result) > 0) {
                    $row = $query_cekuser->getRow();
                    $password_user = $row->password;

                    if (password_verify($password, $password_user)) {
                        $simpan_session = [
                            'login' => true,
                            'ppdb_id' => $row->ppdb_id,
                            'nisn'   => $nisn,
                            'password'   => $row->password,
                            'nama_lengkap'  => $row->nama_lengkap,
                            'foto_siswa' => $row->foto_siswa,
                        ];

                        $this->session->set($simpan_session);

                        $msg = [
                            'sukses' => [
                                'link' => '/ppdb/profile'
                            ]
                        ];
                    } else {
                        $msg = [
                            'error' => [
                                'password' => 'Password salah!'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'nisn' => 'Nisn tidak ditemukan!'
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        }
    }

    public function ubahpassword()
    {
        if (!session()->get('ppdb_id')) {
            return redirect()->to('login');
        }
        $id = session()->get('ppdb_id');
        $list =  $this->ppdb->find($id);
        $data = [
            'title' => 'Ubah Password Peserta - SMA Jujutsu',
            'ppdb_id'            => $list['ppdb_id'],
        ];
        return view('ppdb/login/ubahpassword', $data);
    }

    public function editpassword()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'oldpassword' => [
                    'label' => 'Password Lama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'confirm' => [
                    'label' => 'Konfirmasi Password',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'matches' => '{field} tidak sama',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'oldpassword'   => $validation->getError('oldpassword'),
                        'password'      => $validation->getError('password'),
                        'confirm'       => $validation->getError('confirm'),
                    ],

                ];
            } else {
                $id = session()->get('ppdb_id');
                $get =  $this->ppdb->find($id);
                $currentpass = $get['password'];
                $oldpassword = $this->request->getVar('oldpassword');
                if (password_verify($oldpassword,  $currentpass)) {
                    $simpandata = [
                        'password'     => (password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)),
                    ];
                    $ppdb_id = $this->request->getVar('ppdb_id');
                    $this->ppdb->update($ppdb_id, $simpandata);
                    session()->setFlashdata('success', 'Password berhasil diubah!');
                } else {
                    session()->setFlashdata('gagal', 'Password lama salah!');
                }
                $msg = [
                    'sukses' => 'Password berhasil diubah!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function profile()
    {
        if (!session()->get('ppdb_id')) {
            return redirect()->to('login');
        }
        $id = session()->get('ppdb_id');
        $list =  $this->ppdb->find($id);
        $data = [
            'title'              => 'PPDB - Profile',
            'ppdb_id'            => $list['ppdb_id'],
            'nisn'               => $list['nisn'],
            'nama_lengkap'       => $list['nama_lengkap'],
            'tgl_lahir'          => $list['tgl_lahir'],
            'tmp_lahir'          => $list['tmp_lahir'],
            'jenkel'             => $list['jenkel'],
            'asal_sekolah'       => $list['asal_sekolah'],
            'nama_ayah'          => $list['nama_ayah'],
            'nama_ibu'           => $list['nama_ibu'],
            'agama'              => $list['agama'],
            'transportasi'       => $list['transportasi'],
            'jenis_tinggal'      => $list['jenis_tinggal'],
            'alamat'             => $list['alamat'],
            'no_telp'            => $list['no_telp'],
            'jurusan'            => $list['jurusan'],
            'foto_siswa'         => $list['foto_siswa'],
            'foto_ijazah'        => $list['foto_ijazah'],
            'status'             => $list['status'],
        ];
        return view('ppdb/login/profile', $data);
    }

    public function editprofile()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nisn' => [
                    'label' => 'Nisn',
                    'rules' => 'required|alpha_numeric_space',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'alpha_numeric_space' => 'Tidak boleh mengandung karakter unik',
                    ]
                ],
                'nama_lengkap' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tgl_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tmp_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'agama' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'asal_sekolah' => [
                    'label' => 'Asal Sekolah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_ayah' => [
                    'label' => 'Nama Ayah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_ibu' => [
                    'label' => 'Nama Ibu',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jenis_tinggal' => [
                    'label' => 'Jenis Tinggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'transportasi' => [
                    'label' => 'Transportasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'no_telp' => [
                    'label' => 'No Telp',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jurusan' => [
                    'label' => 'Jurusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nisn' => $validation->getError('nisn'),
                        'nama_lengkap' => $validation->getError('nama_lengkap'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'tmp_lahir' => $validation->getError('tmp_lahir'),
                        'jenkel' => $validation->getError('jenkel'),
                        'agama' => $validation->getError('agama'),
                        'asal_sekolah' => $validation->getError('asal_sekolah'),
                        'jenis_tinggal' => $validation->getError('jenis_tinggal'),
                        'nama_ayah' => $validation->getError('nama_ayah'),
                        'nama_ibu' => $validation->getError('nama_ibu'),
                        'transportasi' => $validation->getError('transportasi'),
                        'alamat' => $validation->getError('alamat'),
                        'no_telp' => $validation->getError('no_telp'),
                        'jurusan' => $validation->getError('jurusan'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nisn'         => $this->request->getVar('nisn'),
                    'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'tmp_lahir' => $this->request->getVar('tmp_lahir'),
                    'jenkel' => $this->request->getVar('jenkel'),
                    'agama' => $this->request->getVar('agama'),
                    'asal_sekolah' => $this->request->getVar('asal_sekolah'),
                    'jenis_tinggal' => $this->request->getVar('jenis_tinggal'),
                    'nama_ayah' => $this->request->getVar('nama_ayah'),
                    'nama_ibu' => $this->request->getVar('nama_ibu'),
                    'alamat' => $this->request->getVar('alamat'),
                    'transportasi' => $this->request->getVar('transportasi'),
                    'no_telp' => $this->request->getVar('no_telp'),
                    'jurusan' => $this->request->getVar('jurusan'),
                ];
                $ppdb_id = $this->request->getVar('ppdb_id');
                $this->ppdb->update($ppdb_id, $simpandata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formuploadijazah()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            $list =  $this->ppdb->find($ppdb_id);
            $data = [
                'title' => 'Upload Scan Ijazah',
                'list'  => $list,
                'ppdb_id' => $list['ppdb_id']
            ];
            $msg = [
                'sukses' => view('ppdb/login/uploadijazah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function douploadijazah()
    {
        if ($this->request->isAJAX()) {

            $ppdb_id = $this->request->getVar('ppdb_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'foto_ijazah' => [
                    'label' => 'Upload Foto',
                    'rules' => 'uploaded[foto_ijazah]|mime_in[foto_ijazah,image/png,image/jpg,image/jpeg]|is_image[foto_ijazah]',
                    'errors' => [
                        'uploaded' => 'Masukkan Foto',
                        'mime_in' => 'Harus Foto!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'foto_ijazah' => $validation->getError('foto_ijazah')
                    ]
                ];
            } else {
                //check
                $cekdata = $this->ppdb->find($ppdb_id);
                $fotolama = $cekdata['foto_ijazah'];
                if ($fotolama != 'default.png') {
                    unlink('img/ppdb/ijazah/' . $fotolama);
                    unlink('img/ppdb/ijazah/thumb/' . 'thumb_' . $fotolama);
                }

                $filegambar = $this->request->getFile('foto_ijazah');

                $updatedata = [
                    'foto_ijazah' => 'Ijazah' . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension(),
                ];

                $this->ppdb->update($ppdb_id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(250, 250, 'center')
                    ->save('img/ppdb/ijazah/thumb/' . 'thumb_' .  'Ijazah' . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                \Config\Services::image()
                    ->withFile($filegambar)
                    ->save('img/ppdb/ijazah/' .  'Ijazah' . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                $msg = [
                    'sukses' => 'Foto berhasil diupload!',
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formuploadfoto()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            $list =  $this->ppdb->find($ppdb_id);
            $data = [
                'title' => 'Upload Foto',
                'list'  => $list,
                'ppdb_id' => $list['ppdb_id']
            ];
            $msg = [
                'sukses' => view('ppdb/login/uploadfoto', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function douploadfoto()
    {
        if ($this->request->isAJAX()) {

            $ppdb_id = $this->request->getVar('ppdb_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'foto_siswa' => [
                    'label' => 'Upload Foto',
                    'rules' => 'uploaded[foto_siswa]|mime_in[foto_siswa,image/png,image/jpg,image/jpeg]|is_image[foto_siswa]',
                    'errors' => [
                        'uploaded' => 'Masukkan Foto',
                        'mime_in' => 'Harus Foto!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'foto_siswa' => $validation->getError('foto_siswa')
                    ]
                ];
            } else {
                //check
                $cekdata = $this->ppdb->find($ppdb_id);
                $fotolama = $cekdata['foto_siswa'];
                if ($fotolama != 'default.png') {
                    unlink('img/ppdb/' . $fotolama);
                    unlink('img/ppdb/thumb/' . 'thumb_' . $fotolama);
                }
                $filegambar = $this->request->getFile('foto_siswa');
                $updatedata = [
                    'foto_siswa' => $cekdata['nama_lengkap'] . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension(),
                ];
                $this->ppdb->update($ppdb_id, $updatedata);
                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(250, 250, 'center')
                    ->save('img/ppdb/thumb/' . 'thumb_' .  $cekdata['nama_lengkap'] . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                \Config\Services::image()
                    ->withFile($filegambar)
                    ->save('img/ppdb/' .  $cekdata['nama_lengkap'] . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                $msg = [
                    'sukses' => 'Foto berhasil diupload!',
                ];
            }
            echo json_encode($msg);
        }
    }

    public function cetak()
    {
        $id = session()->get('ppdb_id');
        $list =  $this->ppdb->getsiswa($id);
        if (!isset($list)) return redirect()->to('/ppdb');
        $data = [
            'title'          => 'PPDB - SMA Jujutsu',
            'ppdb_id'        => $list->ppdb_id,
            'nisn'           => $list->nisn,
            'nama_lengkap'   => $list->nama_lengkap,
            'jenkel'         => $list->jenkel,
            'agama'          => $list->agama,
            'jurusan'        => $list->jurusan,
            'alamat'         => $list->alamat,
            'no_telp'        => $list->no_telp,
            'asal_sekolah'   => $list->asal_sekolah,
            'tgl_daftar'     => $list->tgl_daftar,
            'tgl_lahir'      => $list->tgl_lahir,
            'tmp_lahir'      => $list->tmp_lahir,
        ];
        return view('ppdb/login/cetak', $data);
    }

    public function logout()
    {
        if ($this->request->isAJAX()) {

            $this->session->destroy();

            $data = [
                'respond'   => 'success',
                'message'   => 'Anda berhasil logout!'
            ];

            echo json_encode($data);
        }
    }
}
