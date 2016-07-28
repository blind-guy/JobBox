<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('jobs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('company_name');
            $table->date('posted');
            $table->date('expired');
            $table->string('job_url');
            $table->integer('contactid');
            $table->string('position');
            $table->text('summary');
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
        Scheme::drop('jobs');
	}

}
