<?php

namespace App\Controllers;

use App\Models\skLModel;

class Bsurat extends BaseController
{

    protected $sk_laporan;
    public function __construct()
    {
        $this->sk_laporan = new skLModel();
    }

    public function skLaporan()
    {
        $sk = $this->sk_laporan->getSurat();

        $data = [
            'judul' => 'Tranksasi Surat Keluar Laporan | Rumah Bahasa',
            'sk_laporan' => $sk
        ];
        return view('SK_laporan.php', $data);
    }

    public function createLaporan()
    {
        // session();
        $data = [
            'judul' => 'Buat Surat Keluar Laporan',
            'validation' => \Config\Services::validation()
        ];
        return view('createLaporan.php', $data);
    }

    public function detailLaporan($id)
    {
        $sk = $this->sk_laporan->getSurat($id);
        $data = [
            'judul' => 'Detail Surat Keluar Laporan | Rumah Bahasa',
            'sk_laporan' => $sk
        ];
        return view('detailLaporan.php', $data);
    }

    public function deleteLaporan($id)
    {

        $this->sk_laporan->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/Bsurat/skLaporan');
    }

    public function saveLaporan()
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
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Transaksi/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Bsurat/createLaporan')->withInput();
        }



        $this->sk_laporan->save([
            'no_surat' => $this->request->getVar('no_surat'),
            'pengirim' => $this->request->getVar('pengirim'),
            'perihal' => $this->request->getVar('perihal'),
            'tujuan' => $this->request->getVar('tujuan'),
            'tanggal' => $this->request->getVar('tanggal'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/Bsurat/skLaporan');
    }
}
