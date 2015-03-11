<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('links', function($table) {
			$table->increments('id');
			$table->string('name')->index();
			$table->boolean('status')->default(1);
			$table->string('url');
			$table->timestamps();
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('links');
	}

}
