<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('assets', function($table) {
			$table->increments('id');
			$table->string('name')->index();
			$table->text('status');
			$table->text('description');
			$table->text('site');
			$table->integer('country_id')->unsigned();
			$table->foreign('country_id')->references('id')->on('countries');
			$table->integer('priority_id')->unsigned();
			$table->foreign('priority_id')->references('id')->on('priorities');
			$table->text('responsible');
			$table->date('responsible_date');
			$table->text('categorization');
			$table->text('documentation');
			$table->text('procurement');
			$table->text('procurement_ku');
			$table->text('procurement_rr');
			$table->text('procurement_er');
			$table->text('imac_services');
			$table->text('imac_ku');
			$table->text('imac_rr');
			$table->text('imac_er');
			$table->text('support_services');
			$table->text('support_ku');
			$table->text('support_rr');
			$table->integer('team_id')->unsigned();
			$table->foreign('team_id')->references('id')->on('teams');
			$table->text('level1_more');
			$table->integer('team_id_2')->unsigned();
			$table->foreign('team_id_2')->references('id')->on('teams');
			$table->text('level2_more');
			$table->integer('team_id_3')->unsigned();
			$table->foreign('team_id_3')->references('id')->on('teams');
			$table->text('level3_more');
			$table->text('administration');
			$table->text('administration_ku');
			$table->text('administration_rr');
			$table->text('administration_er');
			$table->text('operation_order');
			$table->text('oo_ku');
			$table->text('oo_rr');
			$table->text('oo_er');
			$table->text('small_enhancement');
			$table->text('sm_ku');
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
		Schema::drop('assets');
	}

}
