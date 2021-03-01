<?php

namespace App\Controllers;

use Config\Services;

class Siswa extends BaseController
{

    public function index()
    {
        if (session()->get('level') <> 2) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'title' => 'Siswa - SMA Jujutsu',
        ];
        return view('auth/siswa/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'List Siswa - SMA Jujutsu',
                'list' => $this->siswa->list()

            ];
            $msg = [
                'data' => view('auth/siswa/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function getdatasiswa()
    {
        $request = Services::request();
        $datamodel = $this->siswa;
        if ($request->getMethod()) {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;

                $row = [];
                $edit = "<button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"edit('" . $list->siswa_id . "')\">
                <i class=\"fa fa-edit\"></i>
            </button>";
                $hapus = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->siswa_id . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

                $row[] = "<input type=\"checkbox\" name=\"siswa_id[]\" class=\"centangSiswaid\" value=\"$list->siswa_id\">";
                $row[] = $no;
                $row[] = $list->nis;
                $row[] = $list->nama;
                $row[] = $list->nama_kelas;
                $row[] = $list->alamat;
                $row[] = $list->tmp_lahir . ", " . date_indo($list->tgl_lahir);
                $row[] = $list->jenkel;

                $row[] = $edit . " " . $hapus;
                $data[] = $row;
            }
            $output = [
                "recordTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];

            echo json_encode($output);
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Siswa',
                'kelas' => $this->kelas->orderBy('nama_kelas', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/siswa/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nis' => [
                    'label' => 'Nis',
                    'rules' => 'required|is_unique[siswa.nis]|min_length[5]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                        'min_length' => '{field} minimal 5',
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Siswa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kelas_id' => [
                    'label' => 'Kelas',
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
                'tmp_lahir' => [
                    'label' => 'Tempat Lahir',
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
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nis' => $validation->getError('nis'),
                        'nama' => $validation->getError('nama'),
                        'kelas_id' => $validation->getError('kelas_id'),
                        'alamat' => $validation->getError('alamat'),
                        'tmp_lahir' => $validation->getError('tmp_lahir'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'jenkel' => $validation->getError('jenkel')
                    ]
                ];
            } else {
                $simpandata = [
                    'nis' => $this->request->getVar('nis'),
                    'nama' => $this->request->getVar('nama'),
                    'kelas_id' => $this->request->getVar('kelas_id'),
                    'alamat' => $this->request->getVar('alamat'),
                    'tmp_lahir' => $this->request->getVar('tmp_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'jenkel' => $this->request->getVar('jenkel'),
                ];

                $this->siswa->insert($simpandata);
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
            $siswa_id = $this->request->getVar('siswa_id');
            $list =  $this->siswa->find($siswa_id);
            $kelas =  $this->kelas->list();
            $data = [
                'title'         => 'Edit Siswa',
                'kelas'         => $kelas,
                'siswa_id'      => $list['siswa_id'],
                'nis'           => $list['nis'],
                'nama'          => $list['nama'],
                'kelas_id'      => $list['kelas_id'],
                'alamat'        => $list['alamat'],
                'tmp_lahir'     => $list['tmp_lahir'],
                'tgl_lahir'     => $list['tgl_lahir'],
                'jenkel'        => $list['jenkel'],
            ];
            $msg = [
                'sukses' => view('auth/siswa/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nis' => [
                    'label' => 'Nis',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Siswa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kelas_id' => [
                    'label' => 'Kelas',
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
                'tmp_lahir' => [
                    'label' => 'Tempat Lahir',
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
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nis' => $validation->getError('nis'),
                        'nama' => $validation->getError('nama'),
                        'kelas_id' => $validation->getError('kelas_id'),
                        'alamat' => $validation->getError('alamat'),
                        'tmp_lahir' => $validation->getError('tmp_lahir'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'jenkel' => $validation->getError('jenkel')
                    ]
                ];
            } else {
                $updatedata = [
                    'nis' => $this->request->getVar('nis'),
                    'nama' => $this->request->getVar('nama'),
                    'kelas_id' => $this->request->getVar('kelas_id'),
                    'alamat' => $this->request->getVar('alamat'),
                    'tmp_lahir' => $this->request->getVar('tmp_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'jenkel' => $this->request->getVar('jenkel'),
                ];

                $siswa_id = $this->request->getVar('siswa_id');
                $this->siswa->update($siswa_id, $updatedata);
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

            $siswa_id = $this->request->getVar('siswa_id');
            $this->siswa->delete($siswa_id);
            $msg = [
                'sukses' => 'Data Staf Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function hapusall()
    {
        if ($this->request->isAJAX()) {
            $siswa_id = $this->request->getVar('siswa_id');
            $jmldata = count($siswa_id);
            for ($i = 0; $i < $jmldata; $i++) {
                $this->siswa->delete($siswa_id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }


    //Kelas backend
    public function kelas()
    {
        if (session()->get('level') <> 2) {
            return redirect()->to('dashboard');
        }
        $data = [
            'title' => 'Kelas - SMA Jujutsu'
        ];
        return view('auth/kelas/index', $data);
    }

    public function getkelas()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Siswa - Kelas',
                'list' => $this->kelas->listjoin()
            ];
            $msg = [
                'data' => view('auth/kelas/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formkelas()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Kelas',
                'guru' => $this->guru->orderBy('nama', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/kelas/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpankelas()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kelas' => [
                    'label' => 'Nama Kelas',
                    'rules' => 'required|is_unique[kelas.nama_kelas]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ],
                'guru_id' => [
                    'label' => 'Wali kelas',
                    'rules' => 'required|is_unique[kelas.guru_id]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kelas' => $validation->getError('nama_kelas'),
                        'guru_id' => $validation->getError('guru_id'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nama_kelas' => $this->request->getVar('nama_kelas'),
                    'guru_id'    => $this->request->getVar('guru_id'),
                ];

                $this->kelas->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formeditkelas()
    {
        if ($this->request->isAJAX()) {
            $kelas_id = $this->request->getVar('kelas_id');
            $list =  $this->kelas->find($kelas_id);
            $guru =  $this->guru->list();
            $data = [
                'title'           => 'Edit Kelas',
                'guru'            => $guru,
                'kelas_id'        => $list['kelas_id'],
                'nama_kelas'      => $list['nama_kelas'],
                'guru_id'         => $list['guru_id'],
            ];
            $msg = [
                'sukses' => view('auth/kelas/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatekelas()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kelas' => [
                    'label' => 'Nama Kelas',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'guru_id' => [
                    'label' => 'Wali kelas',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kelas' => $validation->getError('nama_kelas'),
                        'guru_id' => $validation->getError('guru_id'),
                    ]
                ];
            } else {
                $updatedata = [
                    'nama_kelas' => $this->request->getVar('nama_kelas'),
                    'guru_id' => $this->request->getVar('guru_id'),
                ];

                $kelas_id = $this->request->getVar('kelas_id');
                $this->kelas->update($kelas_id, $updatedata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapuskelas()
    {
        if ($this->request->isAJAX()) {

            $kelas_id = $this->request->getVar('kelas_id');

            $this->kelas->delete($kelas_id);
            $msg = [
                'sukses' => 'Data Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }


    // PP Back-end
    public function spp()
    {
        if (session()->get('level') <> 2) {
            return redirect()->to('dashboard');
        }
        $data = [
            'title' => 'Siswa - SPP'
        ];
        return view('auth/spp/index', $data);
    }

    public function getspp()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Siswa - SPP',
                'list' => $this->spp->listjoin()
            ];
            $msg = [
                'data' => view('auth/spp/list', $data)
            ];
            echo json_encode($msg);
        }
    }


    public function getdataspp()
    {
        $request = Services::request();
        $datamodel = $this->spp;
        if ($request->getMethod()) {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;

                $row = [];
                $edit = "<button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"edit('" . $list->spp_id . "')\">
                <i class=\"fa fa-edit\"></i>
            </button>";
                $hapus = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->spp_id . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

                $row[] = "<input type=\"checkbox\" name=\"spp_id[]\" class=\"centangSppid\" value=\"$list->spp_id\">";
                $row[] = $no;
                $row[] = $list->nis;
                $row[] = $list->nama;
                $row[] = $list->nama_kelas;
                $row[] = $edit . " " . $hapus;
                $data[] = $row;
            }
            $output = [
                "recordTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];

            echo json_encode($output);
        }
    }

    public function formspp()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Data SPP',
                'siswa' => $this->siswa->list()
            ];
            $msg = [
                'data' => view('auth/spp/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpanspp()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'siswa_id' => [
                    'label' => 'Nama Siswa',
                    'rules' => 'required|is_unique[spp.siswa_id]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ],
                'januari' => [
                    'label' => 'Januari',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'februari' => [
                    'label' => 'Februari',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'maret' => [
                    'label' => 'Maret',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'april' => [
                    'label' => 'April',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'mei' => [
                    'label' => 'Mei',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'juni' => [
                    'label' => 'Juni',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'juli' => [
                    'label' => 'Juli',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'agustus' => [
                    'label' => 'Agustus',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'september' => [
                    'label' => 'September',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'oktober' => [
                    'label' => 'Oktober',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'november' => [
                    'label' => 'November',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'desember' => [
                    'label' => 'Desember',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'siswa_id' => $validation->getError('siswa_id'),
                        'januari' => $validation->getError('januari'),
                        'februari' => $validation->getError('februari'),
                        'maret' => $validation->getError('maret'),
                        'april' => $validation->getError('april'),
                        'mei' => $validation->getError('mei'),
                        'juni' => $validation->getError('juni'),
                        'juli' => $validation->getError('juli'),
                        'agustus' => $validation->getError('agustus'),
                        'september' => $validation->getError('september'),
                        'oktober' => $validation->getError('oktober'),
                        'november' => $validation->getError('november'),
                        'desember' => $validation->getError('desember'),
                    ]
                ];
            } else {
                $simpandata = [
                    'siswa_id' => $this->request->getVar('siswa_id'),
                    'januari'    => $this->request->getVar('januari'),
                    'februari'    => $this->request->getVar('februari'),
                    'maret'    => $this->request->getVar('maret'),
                    'april'    => $this->request->getVar('april'),
                    'mei'    => $this->request->getVar('mei'),
                    'juni'    => $this->request->getVar('juni'),
                    'juli'    => $this->request->getVar('juli'),
                    'agustus'    => $this->request->getVar('agustus'),
                    'september'    => $this->request->getVar('september'),
                    'oktober'    => $this->request->getVar('oktober'),
                    'november'    => $this->request->getVar('november'),
                    'desember'    => $this->request->getVar('desember'),
                ];

                $this->spp->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formeditspp()
    {
        if ($this->request->isAJAX()) {
            $spp_id = $this->request->getVar('spp_id');
            $list =  $this->spp->find($spp_id);
            $siswa =  $this->siswa->list();
            $data = [
                'title'             => 'Edit Data SPP',
                'siswa'             => $siswa,
                'spp_id'            => $list['spp_id'],
                'januari'           => $list['januari'],
                'februari'          => $list['februari'],
                'maret'             => $list['maret'],
                'april'             => $list['april'],
                'mei'               => $list['mei'],
                'juni'              => $list['juni'],
                'juli'              => $list['juli'],
                'agustus'           => $list['agustus'],
                'september'         => $list['september'],
                'oktober'           => $list['oktober'],
                'november'          => $list['november'],
                'desember'          => $list['desember'],
                'siswa_id'          => $list['siswa_id'],
            ];
            $msg = [
                'sukses' => view('auth/spp/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatespp()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([

                'januari' => [
                    'label' => 'Januari',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'februari' => [
                    'label' => 'Februari',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'maret' => [
                    'label' => 'Maret',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'april' => [
                    'label' => 'April',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'mei' => [
                    'label' => 'Mei',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'juni' => [
                    'label' => 'Juni',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'juli' => [
                    'label' => 'Juli',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'agustus' => [
                    'label' => 'Agustus',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'september' => [
                    'label' => 'September',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'oktober' => [
                    'label' => 'Oktober',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'november' => [
                    'label' => 'November',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'desember' => [
                    'label' => 'Desember',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'siswa_id' => $validation->getError('siswa_id'),
                        'januari' => $validation->getError('januari'),
                        'februari' => $validation->getError('februari'),
                        'maret' => $validation->getError('maret'),
                        'april' => $validation->getError('april'),
                        'mei' => $validation->getError('mei'),
                        'juni' => $validation->getError('juni'),
                        'juli' => $validation->getError('juli'),
                        'agustus' => $validation->getError('agustus'),
                        'september' => $validation->getError('september'),
                        'oktober' => $validation->getError('oktober'),
                        'november' => $validation->getError('november'),
                        'desember' => $validation->getError('desember'),
                    ]
                ];
            } else {
                $updatedata = [
                    'siswa_id' => $this->request->getVar('siswa_id'),
                    'januari'    => $this->request->getVar('januari'),
                    'februari'    => $this->request->getVar('februari'),
                    'maret'    => $this->request->getVar('maret'),
                    'april'    => $this->request->getVar('april'),
                    'mei'    => $this->request->getVar('mei'),
                    'juni'    => $this->request->getVar('juni'),
                    'juli'    => $this->request->getVar('juli'),
                    'agustus'    => $this->request->getVar('agustus'),
                    'september'    => $this->request->getVar('september'),
                    'oktober'    => $this->request->getVar('oktober'),
                    'november'    => $this->request->getVar('november'),
                    'desember'    => $this->request->getVar('desember'),
                ];

                $spp_id = $this->request->getVar('spp_id');
                $this->spp->update($spp_id, $updatedata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapusspp()
    {
        if ($this->request->isAJAX()) {

            $spp_id = $this->request->getVar('spp_id');

            $this->spp->delete($spp_id);
            $msg = [
                'sukses' => 'Data Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function hapusallspp()
    {
        if ($this->request->isAJAX()) {
            $spp_id = $this->request->getVar('spp_id');
            $jmldata = count($spp_id);
            for ($i = 0; $i < $jmldata; $i++) {
                $this->spp->delete($spp_id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }

    //PPDB Backend
    public function ppdb()
    {
        $data = [
            'title' => 'List Peserta PPDB - SMA Jujutsu',
        ];
        return view('auth/ppdb/index', $data);
    }

    public function getdatappdb()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'List Peserta PPDB - SMA Jujutsu',
                'list' => $this->ppdb->orderBy('ppdb_id', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/ppdb/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formeditppdb()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            $list =  $this->ppdb->find($ppdb_id);
            $data = [
                'title'         => 'Detail Pendaftar',
                'ppdb_id'       => $list['ppdb_id'],
                'nisn'          => $list['nisn'],
                'jurusan'       => $list['jurusan'],
                'agama'         => $list['agama'],
                'jenkel'        => $list['jenkel'],
                'nama_lengkap'  => $list['nama_lengkap'],
                'alamat'        => $list['alamat'],
                'tgl_lahir'     => $list['tgl_lahir'],
                'tmp_lahir'     => $list['tmp_lahir'],
                'asal_sekolah'  => $list['asal_sekolah'],
                'transportasi'  => $list['transportasi'],
                'jenis_tinggal' => $list['jenis_tinggal'],
                'no_telp'       => $list['no_telp'],
                'nama_ayah'     => $list['nama_ayah'],
                'nama_ibu'      => $list['nama_ibu'],
                'foto_siswa'    => $list['foto_siswa'],
                'foto_ijazah'   => $list['foto_ijazah'],
                'status'        => $list['status'],

            ];
            $msg = [
                'sukses' => view('auth/ppdb/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updateppdb()
    {
        if ($this->request->isAJAX()) {
            $updatedata = [
                'nisn'      => $this->request->getVar('nisn'),
                'jurusan'   => $this->request->getVar('jurusan'),
                'agama'     => $this->request->getVar('agama'),
                'jenkel'        => $this->request->getVar('jenkel'),
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'alamat' => $this->request->getVar('alamat'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'tmp_lahir' => $this->request->getVar('tmp_lahir'),
                'asal_sekolah' => $this->request->getVar('asal_sekolah'),
                'transportasi' => $this->request->getVar('transportasi'),
                'nama_ayah' => $this->request->getVar('nama_ayah'),
                'nama_ibu' => $this->request->getVar('nama_ibu'),
                'jenis_tinggal' => $this->request->getVar('jenis_tinggal'),
                'no_telp' => $this->request->getVar('no_telp'),
                'status' => $this->request->getVar('status'),
            ];

            $ppdb_id = $this->request->getVar('ppdb_id');
            $this->ppdb->update($ppdb_id, $updatedata);
            $msg = [
                'sukses' => 'Data berhasil diupdate'
            ];
            echo json_encode($msg);
        }
    }

    public function hapusppdb()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            //check
            $cekdata = $this->ppdb->find($ppdb_id);
            $fotosiswa = $cekdata['foto_siswa'];
            $fotoijazah = $cekdata['foto_ijazah'];
            if ($fotosiswa != 'default.png') {
                unlink('img/ppdb/' . $fotosiswa);
                unlink('img/ppdb/thumb/' . 'thumb_' . $fotosiswa);
            }
            if ($fotoijazah != 'default.png') {
                unlink('img/ppdb/ijazah/' . $fotoijazah);
                unlink('img/ppdb/ijazah/thumb/' . 'thumb_' . $fotoijazah);
            }
            $this->ppdb->delete($ppdb_id);
            $msg = [
                'sukses' => 'Peserta Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function hapusallppdb()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            $jmldata = count($ppdb_id);
            for ($i = 0; $i < $jmldata; $i++) {
                //check
                $cekdata = $this->ppdb->find($ppdb_id[$i]);
                $fotosiswa = $cekdata['foto_siswa'];
                $fotoijazah = $cekdata['foto_ijazah'];
                if ($fotosiswa != 'default.png') {
                    unlink('img/ppdb/' . $fotosiswa);
                    unlink('img/ppdb/thumb/' . 'thumb_' . $fotosiswa);
                }
                if ($fotoijazah != 'default.png') {
                    unlink('img/ppdb/ijazah/' . $fotoijazah);
                    unlink('img/ppdb/ijazah/thumb/' . 'thumb_' . $fotoijazah);
                }
                $this->ppdb->delete($ppdb_id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }
}
