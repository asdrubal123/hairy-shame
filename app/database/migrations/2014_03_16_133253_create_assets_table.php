<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assets', function(Blueprint $table)
		{  
			$table->increments('id');
			$table->string('Composants', 255);
			$table->string('Status', 255);
			$table->text('Description');
			$table->string('Site', 255);
			$table->text('Criticite');
			$table->string('Level1', 255);
			$table->string('Level2', 255);
			$table->string('Level3', 255);			
			$table->integer('country_id');
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
		Schema::drop('assets');
	}

}