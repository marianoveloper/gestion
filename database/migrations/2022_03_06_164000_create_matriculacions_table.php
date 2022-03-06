<?php

use App\Models\Matriculacion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculacions', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',[Matriculacion::Alumno,Matriculacion::Docente])->default(Matriculacion::Alumno);//ESTADO DEL CURSO

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
        Schema::dropIfExists('matriculacions');
    }
}
