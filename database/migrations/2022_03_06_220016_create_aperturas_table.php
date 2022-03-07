<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAperturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aperturas', function (Blueprint $table) {
            $table->id();
            $table->string('contacto');
            $table->string('title');
            $table->text('descripcion');
            $table->text('perfil');
            $table->text('alcances');
            $table->text('objetivos');
            $table->string('duracion');
            $table->text('destinatarios');
            $table->text('requisitos');

            $table->unsignedBigInteger('user_id');//USUARIO
            $table->unsignedBigInteger('academic_id');//TIPO DE CURSO O CARRERA
            $table->unsignedBigInteger('subcategory_id');//CATEGORIA QUE PERTENECE
            $table->unsignedBigInteger('sede_id');//CATEGORIA QUE PERTENECE




            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('academic_id')->references('id')->on('academics')->onDelete('set null');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('set null');
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
        Schema::dropIfExists('aperturas');
    }
}
