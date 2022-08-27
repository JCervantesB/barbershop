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
        Schema::table('servicios', function (Blueprint $table) {
            //
            $table->string('nombre');
            $table->integer('precio');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->integer('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('servicios', function (Blueprint $table) {
            //eliminando la llame foranea para poder eliminar los campos
             $table->dropForeign(['categoria_id']);
             $table->dropForeign(['user_id']);
            $table->dropColumn(['nombre','precio','categoria_id','descripcion','imagen','publicado']);
        });
    }
};
