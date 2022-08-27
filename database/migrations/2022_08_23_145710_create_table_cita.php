<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->id();
            $table->integer('servicios_id')->constrained()->onDelete('cascade');
            $table->integer('user_id')->constrained()->onDelete('cascade');
            $table->date('fecha_cita');
            $table->time('hora_cita');


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
        Schema::table('cita', function (Blueprint $table) {
            //eliminando la llame foranea para poder eliminar los campos
             $table->dropForeign(['user_id']);
             $table->dropForeign(['servicios_id']);
            $table->dropColumn(['servicios_id','user_id','hora_cita','fecha_cita']);
        });
    }
};
