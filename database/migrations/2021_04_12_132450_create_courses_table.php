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

            $table->text('description');//descripcion del curso

            $table->string('url_info');//informativo
            $table->string('link_inscription');//link intra/siu/form
            $table->enum('status',[Course::Activo,Course::Borrador])->default(Course::Borrador);//ESTADO DEL CURSO
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
