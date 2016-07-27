<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('documents', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('ownerid');
            $table->integer('type');
            $table->string('name');
            $table->string('location');
            $table->integer('jobid');
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
        Schema::drop('documents');
	}

}
