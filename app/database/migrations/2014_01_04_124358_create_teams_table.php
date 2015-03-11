<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function(Blueprint $table)
		{
			 $table->increments('id');
$table->string('Team', 255);
$table->string('TeamStatus', 255);
$table->text('TeamDescription');
$table->string('TeamSL', 255);
$table->text('TeamCust');
$table->string('TeamTimeTable', 255);
$table->string('TeamPhone', 255);
$table->string('TeamConstraintPhone', 255);
$table->string('TeamEmail', 255);
$table->string('TeamFree1', 255);
$table->string('EFree', 255);
$table->string('EL1TL', 255);
$table->string('EL1Phone', 255);
$table->string('EL1Cell', 255);
$table->string('EL1Email1', 255);
$table->string('EL1Email2', 255);
$table->string('EL1Comments', 255);
$table->string('EL2TL', 255);
$table->string('EL2Phone', 255);
$table->string('EL2Cell', 255);
$table->string('EL2Email1', 255);
$table->string('EL2Email2', 255);
$table->string('EL2Comments', 255);
$table->string('EL3TL', 255);
$table->string('EL3Phone', 255);
$table->string('EL3Cell', 255);
$table->string('EL3Email1', 255);
$table->string('EL3Email2', 255);
$table->string('EL3Comments', 255);
$table->string('EL4TL', 255);
$table->string('EL4Phone', 255);
$table->string('EL4Cell', 255);
$table->string('EL4Email1', 255);
$table->string('EL4Email2', 255);
$table->string('EL4Comments', 255);
$table->string('UpdateDate', 255);
$table->string('UpdateComments', 255);
$table->string('Modifier', 255);
$table->string('Comments', 255);
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
		Schema::drop('teams');

	}

}