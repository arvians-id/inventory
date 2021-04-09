<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataBarangMasuk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_brg_msk' => [
				'type' 				=> 'INT',
				'constraint' 		=> 11,
				'auto_increment'	=> true
			],
			'id_brg' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
			],
			'jml_masuk' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
			],
			'tgl_masuk' => [
				'type'				=> 'DATE',
			],
			'created_at' => [
				'type'				=> 'DATETIME',
				'null'				=> true
			],
			'updated_at' => [
				'type'				=> 'DATETIME',
				'null'				=> true
			]
		]);

		$this->forge->addKey('id_bhn_msk', true);
		$this->forge->createTable('data_barang_masuk');
	}

	public function down()
	{
		$this->forge->dropTable('data_barang_masuk');
	}
}
