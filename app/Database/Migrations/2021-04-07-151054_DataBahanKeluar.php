<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataBahanKeluar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_bhn_klr' => [
				'type' 				=> 'INT',
				'constraint' 		=> 11,
				'auto_increment'	=> true
			],
			'id_brg_msk' => [
				'type' 				=> 'INT',
				'constraint' 		=> 11,
				'auto_increment'	=> true
			],
			'id_bhn' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
			],
			'jml_keluar' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
			],
			'tgl_keluar' => [
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

		$this->forge->addKey('id_bhn_klr', true);
		$this->forge->createTable('data_bahan_keluar');
	}

	public function down()
	{
		$this->forge->dropTable('data_bahan_keluar');
	}
}
