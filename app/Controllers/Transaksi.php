<?php

namespace App\Controllers;

use App\Models\TsmModel;
use App\Models\TskModel;

class Transaksi extends BaseController
{
    protected $surat_masuk;
    public function __construct()
    {
        $this->surat_masuk = new TsmModel();
        $this->surat_keluar = new TskModel();
    }

    public function Tmasuk()
    {

        $sm = $this->surat_masuk->getSurat();

        $currentPage = $this->request->getVar('page_surat_masuk') ? $this->request->getVar('page_surat_masuk') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $suratM = $this->surat_masuk->search($keyword);
        } else {
            $suratM = $this->surat_masuk;
        }

        $data = [
            'judul' => 'Tranksasi Surat Masuk | Rumah Bahasa',
            'surat_masuk' => $suratM->paginate(10, 'surat_masuk'),
            'pager' => $suratM->pager,
            'currentPage' => $currentPage
        ];
        return view('T_suratmasuk.php', $data);
    }

    public function detail($id)
    {
        $sm = $this->surat_masuk->getSurat($id);
        $data = [
            'judul' => 'Detail Surat Masuk | Rumah Bahasa',
            'surat_masuk' => $sm
        ];
        return view('detail.php', $data);
    }


    public function create()
    {
        // session();
        $data = [
            'judul' => 'Tambah Surat Masuk',
            'validation' => \Config\Services::validation()
        ];
        return view('create.php', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'no_surat' => [
                'rules' => 'required|is_unique[surat_masuk.no_surat]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Terdaftar'
                ]
            ],
            'pengirim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'perihal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'penerima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tgl_diterima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'file' => [
                'rules' => 'max_size[file,2048]|ext_in[file,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'File tersebut bukan PDF'

                ]

            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Transaksi/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Transaksi/create')->withInput();
        }

        // ambil pdf
        $filesurat = $this->request->getFile('file');
        if ($filesurat->getError() == 4) {
            $namasurat = 'default.pdf';
        } else {
            //pindah file
            $filesurat->move('surat_masuk');
            //ambil nama file
            $namasurat = $filesurat->getName('file');
        }




        $this->surat_masuk->save([
            'no_surat' => $this->request->getVar('no_surat'),
            'pengirim' => $this->request->getVar('pengirim'),
            'perihal' => $this->request->getVar('perihal'),
            'penerima' => $this->request->getVar('penerima'),
            'tgl_diterima' => $this->request->getVar('tgl_diterima'),
            'file' => $namasurat
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/Transaksi/Tmasuk');
    }

    public function delete($id)
    {
        // cari surat berdasarkan id
        $surat = $this->surat_masuk->find($id);

        //cek jika surat belum diupload
        if ($surat['file'] != 'default.pdf') {

            // hapus surat dalam folder juga
            unlink('surat_masuk/' . $surat['file']);
        }

        $this->surat_masuk->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/Transaksi/Tmasuk');
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Ubah Data Surat Masuk',
            'validation' => \Config\Services::validation(),
            'surat_masuk' => $this->surat_masuk->getSurat($id)
        ];
        return view('edit.php', $data);
    }

    public function update($id)
    {
        //cek no_surat
        $no = $this->surat_masuk->getSurat($this->request->getVar('id'));
        if ($no['no_surat'] == $this->request->getVar('no_surat')) {
            $rule_nosurat = 'required';
        } else {
            $rule_nosurat = 'required|is_unique[surat_masuk.no_surat]';
        }

        //validasi input
        if (!$this->validate([
            'no_surat' => [
                'rules' => $rule_nosurat,
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Terdaftar'
                ]
            ],
            'pengirim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'perihal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'penerima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tgl_diterima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'file' => [
                'rules' => 'max_size[file,2048]|ext_in[file,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'File tersebut bukan PDF'

                ]

            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/Transaksi/edit/' . $this->request->getVar('id'))->withInput();
        }

        $filesurat = $this->request->getFile('file');

        // cek file apakah diperbarui
        if ($filesurat->getError() == 4) {
            $namasurat = $this->request->getVar('fileLama');
        } else {
            //pindah file
            $filesurat->move('surat_masuk');
            //ambil nama file
            $namasurat = $filesurat->getName('file');
            // hapus file lama
            unlink('surat_masuk/' . $this->request->getVar('fileLama'));
        }

        $this->surat_masuk->save([
            'id' => $id,
            'no_surat' => $this->request->getVar('no_surat'),
            'pengirim' => $this->request->getVar('pengirim'),
            'perihal' => $this->request->getVar('perihal'),
            'penerima' => $this->request->getVar('penerima'),
            'tgl_diterima' => $this->request->getVar('tgl_diterima'),
            'file' => $namasurat
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/Transaksi/Tmasuk');
    }

    public function Tkeluar()
    {

        $sk = $this->surat_keluar->getSurat();

        $currentPage = $this->request->getVar('page_surat_keluar') ? $this->request->getVar('page_surat_keluar') : 1;

        $keyword = $this->request->getVar('keywordSK');
        if ($keyword) {
            $suratK = $this->surat_keluar->searchSK($keyword);
        } else {
            $suratK = $this->surat_keluar;
        }

        $data = [
            'judul' => 'Tranksasi Surat Keluar | Rumah Bahasa',
            'surat_keluar' => $suratK->paginate(10, 'surat_keluar'),
            'pager' => $suratK->pager,
            'currentPage' => $currentPage
        ];
        return view('T_suratkeluar.php', $data);
    }

    public function detailSK($id)
    {
        $sk = $this->surat_keluar->getSurat($id);
        $data = [
            'judul' => 'Detail Surat Keluar | Rumah Bahasa',
            'surat_keluar' => $sk
        ];
        return view('detailSK.php', $data);
    }

    public function createSK()
    {
        // session();
        $data = [
            'judul' => 'Tambah Surat Keluar',
            'validation' => \Config\Services::validation()
        ];
        return view('createSK.php', $data);
    }

    public function saveSK()
    {
        //validasi input
        if (!$this->validate([
            'no_surat' => [
                'rules' => 'required|is_unique[surat_masuk.no_surat]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Terdaftar'
                ]
            ],
            'pengirim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'perihal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'file' => [
                'rules' => 'max_size[file,2048]|ext_in[file,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'File tersebut bukan PDF'

                ]

            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Transaksi/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Transaksi/createSK')->withInput();
        }

        // ambil pdf
        $filesurat = $this->request->getFile('file');
        if ($filesurat->getError() == 4) {
            $namasurat = 'default.pdf';
        } else {
            //pindah file
            $filesurat->move('surat_keluar');
            //ambil nama file
            $namasurat = $filesurat->getName('file');
        }




        $this->surat_keluar->save([
            'no_surat' => $this->request->getVar('no_surat'),
            'pengirim' => $this->request->getVar('pengirim'),
            'perihal' => $this->request->getVar('perihal'),
            'tujuan' => $this->request->getVar('tujuan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'file' => $namasurat
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/Transaksi/Tkeluar');
    }

    public function deleteSK($id)
    {
        // cari surat berdasarkan id
        $surat = $this->surat_keluar->find($id);

        //cek jika surat belum diupload
        if ($surat['file'] != 'default.pdf') {

            // hapus surat dalam folder juga
            unlink('surat_keluar/' . $surat['file']);
        }

        $this->surat_keluar->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/Transaksi/Tkeluar');
    }

    public function editSK($id)
    {
        $data = [
            'judul' => 'Ubah Data Surat Kasuk',
            'validation' => \Config\Services::validation(),
            'surat_keluar' => $this->surat_keluar->getSurat($id)
        ];
        return view('editSK.php', $data);
    }

    public function updateSK($id)
    {
        //cek no_surat
        $no = $this->surat_keluar->getSurat($this->request->getVar('id'));
        if ($no['no_surat'] == $this->request->getVar('no_surat')) {
            $rule_nosurat = 'required';
        } else {
            $rule_nosurat = 'required|is_unique[surat_masuk.no_surat]';
        }

        //validasi input
        if (!$this->validate([
            'no_surat' => [
                'rules' => $rule_nosurat,
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Terdaftar'
                ]
            ],
            'pengirim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'perihal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'file' => [
                'rules' => 'max_size[file,2048]|ext_in[file,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'File tersebut bukan PDF'

                ]

            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/Transaksi/editSK/' . $this->request->getVar('id'))->withInput();
        }

        $filesurat = $this->request->getFile('file');

        // cek file apakah diperbarui
        if ($filesurat->getError() == 4) {
            $namasurat = $this->request->getVar('fileLama');
        } else {
            //pindah file
            $filesurat->move('surat_keluar');
            //ambil nama file
            $namasurat = $filesurat->getName('file');
            // hapus file lama
            unlink('surat_keluar/' . $this->request->getVar('fileLama'));
        }

        $this->surat_keluar->save([
            'id' => $id,
            'no_surat' => $this->request->getVar('no_surat'),
            'pengirim' => $this->request->getVar('pengirim'),
            'perihal' => $this->request->getVar('perihal'),
            'tujuan' => $this->request->getVar('tujuan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'file' => $namasurat
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/Transaksi/Tkeluar');
    }
}
