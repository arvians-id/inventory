<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datasupplier extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_supp' => [
				'type' 				=> 'INT',
				'constraint' 		=> 11,
				'auto_increment'	=> true
			],
			'nama' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 128,
			],
			'email' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
				'null'				=> true
			],
			'no_hp' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 20,
			],
			'alamat' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 128,
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

		$this->forge->addKey('id_supp', true);
		$this->forge->createTable('data_supplier');
	}

	public function down()
	{
		$this->forge->dropTable('data_supplier');
	}
}
