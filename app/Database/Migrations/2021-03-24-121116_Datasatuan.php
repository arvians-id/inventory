<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datasatuan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_satuan' => [
				'type' 				=> 'INT',
				'constraint' 		=> 11,
				'auto_increment'	=> true
			],
			'satuan' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
			],
			'created_at' => [
				'type'				=> 'DATETIME',
				'null'				=> true
			],
		]);

		$this->forge->addKey('id_satuan', true);
		$this->forge->createTable('data_satuan');
	}

	public function down()
	{
		$this->forge->dropTable('data_satuan');
	}
}
