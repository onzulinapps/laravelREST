<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
            $table->engine = ('InnoDB');
            $table->bigInteger('id');
            $table->increments('id');
            $table->string('email', 100);
            $table->unique('email');
            $table->string('password', 100);
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->string('numerotelefono');
            $table->string('numerotelefono2');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
