<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class SmSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'no_surat' => '189/LPPNTB/XII/2020',
                'pengirim' => 'Agil Trieanto',
                'perihal' => 'PKL',
                'penerima' => 'LPPNTB Rumah Bahasa',
                'tgl_diterima' => Time::now(),
                'file'    => 'default.pdf',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ];
            $this->db->table('surat_masuk')->insert($data);
        }
        // Simple Queries
        // $this->db->query("INSERT INTO surat_masuk (no_surat,pengirim,perihal,penerima,tgl_diterima,file,created_at,updated_at) VALUES(:no_surat:, :pengirim:,:perihal:, :penerima:,:tgl_diterima:, :file:,:created_at:,:updated_at:)", $data);

        // Using Query Builder
    }
}
