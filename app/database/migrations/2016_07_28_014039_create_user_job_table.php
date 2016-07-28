<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('user_job', function(Blueprint $table)
        {
			$table->increments('id');
			$table->integer('user_id');//Post ID
			$table->integer('job_id');
			
			$table->timestamps('date_added');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Scheme::drop('user_job');
	}

}
