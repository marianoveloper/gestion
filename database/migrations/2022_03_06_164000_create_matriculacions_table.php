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
            $table->enum('tipo',[Matriculacion::Estudiante,Matriculacion::Profesor,Matriculacion::Tutor,Matriculacion::AsesorPedagógico,Matriculacion::ReferenteVirtual,Matriculacion::Coordinador,Matriculacion::Director])->default(Matriculacion::Estudiante);//ESTADO DEL CURSO

            $table->unsignedBigInteger('user_id');//USUARIO
            $table->unsignedBigInteger('academic_id')->nullable();//TIPO DE CURSO O CARRERA
            $table->unsignedBigInteger('carrera_id')->nullable();//CATEGORIA QUE PERTENECE
            $table->enum('status',[Matriculacion::Activo,Matriculacion::Proceso,Matriculacion::Hecho])->default(Matriculacion::Activo);
            $table->string('status_name');
            $table->date('time_start');
            $table->date('date_start');

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
