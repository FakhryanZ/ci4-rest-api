<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'product_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unisgned' => true,
				'auto_increment' => true,
			],
			'product_name' => [
				'type' => 'VARCHAR',
				'constraint' => 200
			],
			'product_price' => [
				'type' => 'DOUBLE'
			]
		]);

		$this->forge->addKey('product_id');
		$this->forge->createTable('product');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('product');
	}
}
