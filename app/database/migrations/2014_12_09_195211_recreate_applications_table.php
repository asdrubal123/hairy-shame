<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('applications', function($table) {
			$table->increments('id');
			$table->string('name', 255)->index();
			$table->text('status');
			$table->text('description');
			$table->text('site');
			$table->integer('priority_id')->unsigned();
			$table->foreign('priority_id')->references('id')->on('priorities');
			$table->text('responsible');
			$table->date('responsible_date');
			$table->text('nbuser');
			$table->text('kuser');
			$table->text('constructor');
			$table->text('documentation');
			$table->text('imac_services');
			$table->text('imac_ku');
			$table->text('imac_rr');
			$table->text('imac_er');
			$table->text('support_services');
			$table->text('support_ku');
			$table->text('support_rr');
			$table->integer('level1_id')->unsigned();
			$table->foreign('level1_id')->references('id')->on('teams');
			$table->text('level1_more');
			$table->integer('level2_id')->unsigned();
			$table->foreign('level2_id')->references('id')->on('teams');
			$table->text('level2_more');
			$table->integer('level3_id')->unsigned();
			$table->foreign('level3_id')->references('id')->on('teams');
			$table->text('level3_more');
			$table->text('administration');
			$table->text('administration_ku');
			$table->text('administration_rr');
			$table->text('administration_er');
			$table->text('operation_order');
			$table->text('oo_ku');
			$table->text('oo_rr');
			$table->text('oo_er');
			$table->text('license');
			$table->text('license_ku');
			$table->text('license_rr');
			$table->text('license_er');
			$table->text('project');
			$table->text('project_ku');
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
		Schema::drop('applications');
	}

}


