<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
		   $table->engine = 'MyISAM'; // means you can't use foreign key constraints
           $table->increments('id');
           $table->string('title');
           $table->text('body');
           $table->timestamps();
			
		});
		DB::statement('ALTER TABLE posts ADD FULLTEXT search(title, body)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			$table->dropIndex('search');
		});
		Schema::drop('posts');
	}

}