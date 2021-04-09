<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Databarang extends Migration
{
	// Belum Selesai
	public function up()
	{
		$this->forge->addField([
			'id_brg' => [
				'type' 				=> 'INT',
				'constraint' 		=> 11,
				'auto_increment'	=> true
			],
			'nama_brg' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 128,
			],
			'id_satuan' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
			],
			'total_stok' => [
				'type'				=> 'INT',
				'constraint'		=> 100,
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

		$this->forge->addKey('id_brg', true);
		$this->forge->createTable('data_barang');
	}

	public function down()
	{
		$this->forge->dropTable('data_barang');
	}
}
