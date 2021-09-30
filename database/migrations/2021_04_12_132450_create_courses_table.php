<?php

use App\Models\Course;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');//titulo
            $table->string('subtitle')->nullable();//subtitulo
            $table->text('description');//descripcion del curso
            $table->string('destination');//destinario
            $table->string('scope_title')->nullable();//alcance del titulo
            $table->string('hours')->nullable();//horas del curso-carrera
            $table->string('duration')->nullable();//duracion
            $table->string('quota')->nullable();//cupo
            $table->date('date_start');//fecha inicio
            $table->date('date_limit');//fecha limite de inscripcion
            $table->integer('price');
            $table->string('url_info');//informativo
            $table->string('link_inscription');//link intra/siu/form
            $table->enum('status',[Course::Borrador,Course::Revision,Course::Publicado])->default(Course::Borrador);//ESTADO DEL CURSO
           $table->enum('status_course',[Course::Activo,Course::Proximamente,Course::Finalizado,Course::Permanente])->default(Course::Activo);
            $table->string('slug');//direccion


//LLAVES FORANEAS
            $table->unsignedBigInteger('user_id');//USUARIO
            $table->unsignedBigInteger('type_id')->nullable();//TIPO DE CURSO O CARRERA
            $table->unsignedBigInteger('category_id')->nullable();//CATEGORIA QUE PERTENECE
           // $table->unsignedBigInteger('payment_id')->nullable();//PAGOS
            $table->unsignedBigInteger('sede_id')->nullable();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
           // $table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null');
            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('set null');



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
        Schema::dropIfExists('courses');
    }
}
