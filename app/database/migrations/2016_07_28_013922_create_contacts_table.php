<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('contacts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('name');

            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('job_id');
            $table->integer('comment_id');

            $table->string('phone');
            $table->string('email');
            
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
		Scheme::drop('contacts');
	}

}
