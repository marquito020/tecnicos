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
        Schema::create('formulario_clientes', function (Blueprint $table) {
            $table->id();
            /* Descripcion */
            $table->string('descripcion');
            /* Fecha */
            $table->date('fecha');
            /* Hora */
            $table->time('hora');
            /* Estado */
            $table->string('estado');
            /* latitude */
            $table->decimal('latitude', 10, 8);
            /* longitude */
            $table->decimal('longitude', 11, 8);
            /* Servicio */
            $table->unsignedBigInteger('id_servicio');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            /* Cliente */
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('formulario_clientes');
    }
};
