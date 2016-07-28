<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('companies', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('street_address');
            $table->string('state');
            $table->integer('zip_code');
            $table->string('phone');
            $table->string('email');
            $table->text('business_type');
            $table->text('mission_statement');
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
		Scheme::drop('companies');
	}

}
