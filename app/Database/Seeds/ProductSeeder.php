<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'product_name' => 'Product 1',
				'product_price' => '2000'
			],
			[
				'product_name' => 'Product 2',
				'product_price' => '5000'
			],
			[
				'product_name' => 'Product 3',
				'product_price' => '4000'
			],
			[
				'product_name' => 'Product 4',
				'product_price' => '6000'
			],
			[
				'product_name' => 'Product 5',
				'product_price' => '7000'
			]
		];

		$this->db->table('product')->insertBatch($data);
	}
}
