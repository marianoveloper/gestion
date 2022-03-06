<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatedrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catedras', function (Blueprint $table) {
            $table->id();
            $table->string('contacto');

            $table->unsignedBigInteger('user_id');//USUARIO
            $table->unsignedBigInteger('academic_id')->nullable();//TIPO DE CURSO O CARRERA
            $table->unsignedBigInteger('carrera_id')->nullable();//CATEGORIA QUE PERTENECE



            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('academic_id')->references('id')->on('academics')->onDelete('set null');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('set null');
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
        Schema::dropIfExists('catedras');
    }
}
