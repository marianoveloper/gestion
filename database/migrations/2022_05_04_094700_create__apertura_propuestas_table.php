<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAperturaPropuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apertura_propuestas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('objetivos');
            $table->string('destinatarios');
            $table->string('requisitos');
            $table->string('cupo');
            $table->date('date_start');
            $table->string('costo');
            $table->string('duracion');
            $table->string('link_pago');
            $table->string('tipo_resol');


            $table->unsignedBigInteger('user_id');//USUARIO
            $table->unsignedBigInteger('academic_id');//TIPO DE CURSO O CARRERA
            $table->unsignedBigInteger('subcategoria_id');//CATEGORIA QUE PERTENECE
            $table->unsignedBigInteger('sede_id');//CATEGORIA QUE PERTENECE




            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('academic_id')->references('id')->on('academics')->onDelete('cascade');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('set null');
            $table->foreign('sede_id')->references('id')->on('sede')->onDelete('set null');
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
        Schema::dropIfExists('apertura_propuestas');
    }
}
