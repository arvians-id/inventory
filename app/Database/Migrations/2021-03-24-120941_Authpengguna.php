<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Authpengguna extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' 				=> 'INT',
				'constraint' 		=> 11,
				'auto_increment'	=> true
			],
			'username' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
			],
			'password' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 256,
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

		$this->forge->addKey('id', true);
		$this->forge->createTable('auth_pengguna');
	}

	public function down()
	{
		$this->forge->dropTable('auth_pengguna');
	}
}
