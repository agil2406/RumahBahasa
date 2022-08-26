<?php

namespace App\Controllers;

use App\Models\LskModel;
use App\Models\LsmModel;

class Home extends BaseController
{

	public function index()
	{
		$db      = \Config\Database::connect();
		$sm = $db->table('surat_masuk');
		$sk = $db->table('surat_keluar');

		$surat_masuk = $sm->countAllResults();
		$surat_keluar = $sk->countAllResults();

		$data = [
			'judul' => 'Dashboard | Rumah Bahasa',
			'surat_masuk' => $surat_masuk,
			'surat_keluar' => $surat_keluar
		];
		return view('home.php', $data);
	}
}
