<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');//nombre
            $table->string('last_name');//apellido
            $table->string('email');//correo
            $table->string('cel');//celular de contacto
            $table->string('contacto');//forma de contacto
            $table->string('question');//elegir tipo de consulta
            $table->text('consulta');//agregar una consulta personalizada

            $table->unsignedBigInteger('course_id');//curso

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}
