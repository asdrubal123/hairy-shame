<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropcolumnTeams extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
				Schema::table('teams', function($table) {
					$table->dropColumn(array('EL4TL', 'EL4Phone', 'EL4Cell', 'EL4Email1', 'EL4Email2', 'EL4Comments', 'UpdateDate', 'UpdateComments', 'Modifier'));
				
	});
	
	}

}
