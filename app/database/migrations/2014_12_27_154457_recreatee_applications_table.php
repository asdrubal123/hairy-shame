<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateeApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('applications', function($table) {
			$table->increments('id');
			$table->string('name')->index();
			$table->boolean('status')->default(1);
			$table->text('description');
			$table->text('site');
			$table->integer('country_id')->unsigned();
			$table->foreign('country_id')->references('id')->on('countries');
			$table->integer('priority_id')->unsigned();
			$table->foreign('priority_id')->references('id')->on('priorities');
			$table->string('responsible');
			$table->date('responsible_date');
			$table->string('nbuser');
			$table->string('key_user');
			$table->string('constructor');
			$table->text('documentation');
			$table->string('imac_services');
			$table->string('imac_ku');
			$table->string('imac_rr');
			$table->string('imac_er');
			$table->string('support_services');
			$table->string('support_ku');
			$table->string('support_rr');
			$table->integer('team_id')->unsigned();
			$table->foreign('team_id')->references('id')->on('teams');
			$table->string('level1_more');
			$table->integer('team2_id')->unsigned();
			$table->foreign('team2_id')->references('id')->on('teams');
			$table->string('level2_more');
			$table->integer('team3_id')->unsigned();
			$table->foreign('team3_id')->references('id')->on('teams');
			$table->string('level3_more');
			$table->string('administration');
			$table->string('administration_ku');
			$table->string('administration_rr');
			$table->string('administration_er');
			$table->string('operation_order');
			$table->string('oo_ku');
			$table->string('oo_rr');
			$table->string('oo_er');
			$table->string('license_provisioning');
			$table->string('license_ku');
			$table->string('license_rr');
			$table->string('license_er');
			$table->string('project');
			$table->string('project_ku');
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




