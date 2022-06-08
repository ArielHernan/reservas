<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments("id_reserva");
            $table->unsignedInteger("id_usuario");
            $table->integer("estado");
            $table->dateTime("fecha_hora_inicio",$precision=2);
            $table->dateTime("fecha_hora_fin",$precision=2);
            $table->integer("numero_personas");
        });

        Schema::table("reservas",function($table) {
            $table->foreign("id_usuario")->references("id_usuario")->on("usuario")->onDelete("cascade");
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }


}
