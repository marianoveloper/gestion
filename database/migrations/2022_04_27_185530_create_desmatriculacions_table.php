<?php

use App\Models\Desmatriculacion;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesmatriculacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desmatriculacions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dni');
            $table->string('mail');
            $table->enum('status',[Desmatriculacion::Activo,Desmatriculacion::Proceso,Desmatriculacion::Hecho])->default(Desmatriculacion::Activo);
            $table->string('status_name');
            $table->enum('tipo',[Desmatriculacion::Estudiante,Desmatriculacion::Profesor,Desmatriculacion::Tutor,Desmatriculacion::AsesorPedagógico,Desmatriculacion::ReferenteVirtual,Desmatriculacion::Coordinador,Desmatriculacion::Director])->default(Desmatriculacion::Estudiante);//ESTADO DEL CURSO

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
        Schema::dropIfExists('desmatriculacions');
    }
}
