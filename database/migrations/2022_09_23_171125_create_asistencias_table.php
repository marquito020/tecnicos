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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            /* latitude */
            $table->decimal('latitude', 10, 8);
            /* longitude */
            $table->decimal('longitude', 11, 8);
            /* latitude final */
            $table->decimal('latitude_final', 10, 8)->nullable();
            /* longitude final */
            $table->decimal('longitude_final', 11, 8)->nullable();

            /* tecnico */
            $table->bigInteger('id_tecnico')->unsigned()->nullable();
            /* administrativo */
            $table->bigInteger('id_administrativo')->unsigned()->nullable();

            /* foreign */
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
        Schema::dropIfExists('turnos');
    }
};
