<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Databahan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_bhn' => [
				'type' 				=> 'INT',
				'constraint' 		=> 11,
				'auto_increment'	=> true
			],
			'nama_bhn' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 128,
			],
			'id_satuan' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
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

		$this->forge->addKey('id_bhn', true);
		$this->forge->createTable('data_bahan');
	}

	public function down()
	{
		$this->forge->dropTable('data_bahan');
	}
}
