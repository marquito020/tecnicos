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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre','20');
            $table->string('apellido_paterno','20');
            $table->string('apellido_materno','20');
            $table->string('ci','10')->nullable();
            $table->string('direccion','254')->nullable();
            $table->string('celular','20');
            $table->string('email','40');
            $table->date('fecha_de_nacimiento')->nullable();
            $table->enum('sexo', ['M', 'F'])->nullable();
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
        Schema::dropIfExists('personas');
    }
};
