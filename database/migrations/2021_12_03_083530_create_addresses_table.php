<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('addresses')) {
			// テーブルが存在していればリターン
			return;
		}
		Schema::create('addresses', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('postal_code');
			$table->string('pre_name');
			$table->string('city_name');
			$table->string('block_name');
			$table->integer('tel_number');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('addresses');
	}
}
