<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActividadesAmigos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actividades_amigos', function(Blueprint $table)
		{
            $table->engine = ('InnoDB');
			$table->bigInteger('idactividad');
            $table->bigInteger('idamigo');
            //intentare crear una clave compuesta algo basico en las bases de datos a ver si asi funciona
            $table->primary(array('idactividad', 'idamigo'));

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
		Schema::drop('amigos');
	}

}
