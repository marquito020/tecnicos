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
        Schema::create('trabajo_asignados', function (Blueprint $table) {
            $table->id();
            /* estado */
            $table->string('estado');
            /* formulario cliente */
            $table->bigInteger('id_formulario_cliente')->unsigned();
            /* tecnico */
            $table->bigInteger('id_tecnico')->unsigned();
            /* administrativo */
            $table->bigInteger('id_administrativo')->unsigned();
            /* foreign */
            $table->foreign('id_formulario_cliente')->references('id')->on('formulario_clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tecnico')->references('id')->on('tecnicos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_administrativo')->references('id')->on('administrativos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('trabajo_asignados');
    }
};
