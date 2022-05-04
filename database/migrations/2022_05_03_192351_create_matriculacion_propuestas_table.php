<?php


use App\Models\MatriculacionPropuesta;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculacionPropuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculacion_propuestas', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',[MatriculacionPropuesta::Estudiante,MatriculacionPropuesta::Profesor,MatriculacionPropuesta::Tutor,MatriculacionPropuesta::AsesorPedagógico,MatriculacionPropuesta::ReferenteVirtual,MatriculacionPropuesta::Coordinador,MatriculacionPropuesta::Director])->default(MatriculacionPropuesta::Estudiante);//ESTADO DEL CURSO

            $table->unsignedBigInteger('user_id');//USUARIO
            $table->unsignedBigInteger('academic_id')->nullable();//TIPO DE CURSO O CARRERA
            $table->unsignedBigInteger('propuesta_id')->nullable();//CATEGORIA QUE PERTENECE
            $table->enum('status',[MatriculacionPropuesta::Activo,MatriculacionPropuesta::Proceso,MatriculacionPropuesta::Hecho])->default(MatriculacionPropuesta::Activo);
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
        Schema::dropIfExists('matriculacion_propuestas');
    }
}
