<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActividades extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actividades', function(Blueprint $table)
		{
            $table->engine = ('InnoDB');
            $table->increments('id');
            $table->bigInteger('id');
            $table->string('nombre', 100);
            //el campo informacion me interesa que sea un campo ntext
            $table->string('informacion');
            $table->string('direccion', 200);
            //este campo cuando no se si lo pondre como cadena de texto normal string o como dateTime
            $table->dateTime('horarioinicial');
            $table->dateTime('horariofinal');
            //variables para la geolocalizacion
            $table->string('latitud');
            $table->string('longitud');
            $table->string('altitud');
            $table->string('precision');

            $table->integer('idusuario');
            //$table->foreign('idusuario')->references('id')->on('usuarios')->onUpdate('cascade');
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
		Schema::drop('actividades');
	}

}
