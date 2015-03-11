<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::table('assets', function($table)
			{
   			 $table->dropColumn('Composants', 'Status', 'Description', 'Site', 'Criticite', 'Level1', 'Level2', 'Level3', 'country_id');
			});
	}

}		
