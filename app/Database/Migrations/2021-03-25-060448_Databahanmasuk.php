<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Databahanmasuk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_bhn_msk' => [
				'type' 				=> 'INT',
				'constraint' 		=> 11,
				'auto_increment'	=> true
			],
			'id_bhn' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
			],
			'id_supp' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
			],
			'jml_masuk' => [
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

		$this->forge->addKey('id_bhn_msk', true);
		$this->forge->createTable('data_bahan_masuk');
	}

	public function down()
	{
		$this->forge->dropTable('data_bahan_masuk');
	}
}
