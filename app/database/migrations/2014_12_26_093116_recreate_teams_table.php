<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateTeamsTable extends Migration {

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
		$table->string('name')->index();
		$table->boolean('status')->default(1);
		$table->text('description');
		$table->string('servicelevel');
		$table->string('customer');
		$table->string('timetable');
		$table->string('phone');
		$table->string('email');
		$table->text('free1');
		$table->string('e1_tl');
		$table->string('e1_phone');
		$table->string('e1_mobile');
		$table->string('e1_email1');
		$table->string('e1_email2');
		$table->text('e1_comments');
		$table->string('e2_tl');
		$table->string('e2_phone');
		$table->string('e2_mobile');
		$table->string('e2_email1');
		$table->string('e2_email2');
		$table->text('e2_comments');
		$table->string('e3_tl');
		$table->string('e3_phone');
		$table->string('e3_mobile');
		$table->string('e3_email1');
		$table->string('e3_email2');
		$table->text('e3_comments');
		$table->text('global_comment');
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
		Schema::drop('teams');
	}

}
