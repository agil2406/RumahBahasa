<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratM extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'no_surat'       => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'pengirim' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'perihal'       => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'penerima'       => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'tgl_diterima' => [
				'type' => 'DATE',
			],
			'file' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('surat_masuk');
	}

	public function down()
	{
		$this->forge->dropTable('surat_masuk');
	}
}
