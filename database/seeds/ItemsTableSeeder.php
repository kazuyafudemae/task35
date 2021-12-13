<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$param = [
			'name' => 'Laravel is PHP framework!!',
			'explanation' => 'Laravel is PHP framework!!',
			'price' => 4,
			'stock' => 4,
		];
		DB::table('items')->insert($param);

		$param = [
			'name' => 'Laravel is PHP framework!!',
			'explanation' => 'Laravel is PHP framework!!',
			'price' => 4,
			'stock' => 4,
			'created_at' => '2021-10-24 08:34:44',
			'deleted_at' => '2021-10-24 08:34:44',
		];
		DB::table('items')->insert($param);
    }
}
