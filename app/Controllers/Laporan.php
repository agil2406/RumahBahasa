<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LskModel;
use App\Models\LsmModel;
use Config\Services;

class Laporan extends Controller
{

    public function keluar()
    {
        $judul = [
            'judul' => ' Laporan Surat Keluar | Rumah Bahasa'
        ];
        echo view('L_suratkeluar', $judul);
    }

    public function ajax_list_keluar()
    {
        $request = Services::request();
        $m_icd = new LskModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $m_icd->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->no_surat;
                $row[] = $list->pengirim;
                $row[] = $list->perihal;
                $row[] = $list->tujuan;
                $row[] = $list->tanggal;
                $data[] = $row;
            }

            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $m_icd->count_all(),
                "recordsFiltered" => $m_icd->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }

    public function masuk()
    {
        $judul = [
            'judul' => ' Laporan Surat Masuk | Rumah Bahasa'
        ];
        echo view('L_suratmasuk', $judul);
    }

    public function ajax_list_masuk()
    {
        $request = Services::request();
        $m_icd = new LsmModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $m_icd->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->no_surat;
                $row[] = $list->pengirim;
                $row[] = $list->perihal;
                $row[] = $list->penerima;
                $row[] = $list->tgl_diterima;
                $data[] = $row;
            }

            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $m_icd->count_all(),
                "recordsFiltered" => $m_icd->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }
}
