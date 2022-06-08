<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas_mesas', function (Blueprint $table) {
            $table->unsignedInteger("id_reserva");
            $table->unsignedInteger("numero_mesa");
        });

        Schema::table("reservas_mesas",function($table) {
            $table->foreign("id_reserva")->references("id_reserva")->on("reservas")->onDelete("cascade");
            $table->foreign("numero_mesa")->references("numero_mesa")->on("mesas")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas_mesas');
    }
}
