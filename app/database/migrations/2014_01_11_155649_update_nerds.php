<?php

use Illuminate\Database\Migrations\Migration;

class UpdateNerds extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement('ALTER TABLE nerds ENGINE=MyISAM');
		DB::statement('ALTER TABLE nerds ADD FULLTEXT search(name, email)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

	}

}