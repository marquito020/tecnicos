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
        Schema::create('control_trabajos', function (Blueprint $table) {
            $table->id();
            /* hora inicio */
            $table->time('hora_inicio');
            /* hora fin */
            $table->time('hora_fin')->nullable();
            /* fecha */
            $table->date('fecha');
            /* latitude inicio */
            $table->decimal('latitude_inicio', 10, 8);
            /* longitude inicio */
            $table->decimal('longitude_inicio', 11, 8);
            /* latitude fin */
            $table->decimal('latitude_fin', 10, 8)->nullable();
            /* longitude fin */
            $table->decimal('longitude_fin', 11, 8)->nullable();
            /* trabajo asignado */
            $table->bigInteger('id_trabajo_asignado')->unsigned();
            $table->foreign('id_trabajo_asignado')->references('id')->on('trabajo_asignados')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('control_trabajos');
    }
};
