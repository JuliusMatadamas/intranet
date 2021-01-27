<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->string('apellidoPaterno', 45);
            $table->string('apellidoMaterno', 45);
            $table->date('fechaNacimiento')->nullable();
            $table->unsignedBigInteger('genero_id');
            $table->string('rfc', 15)->unique();
            $table->string('curp', 20)->unique();
            $table->string('imss', 20)->unique();
            $table->unsignedBigInteger('asentamiento_id');
            $table->string('domicilio', 100)->unique();
            $table->string('tel', 10)->nullable();
            $table->string('email', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('genero_id')->references('id')->on('generos');
            $table->foreign('asentamiento_id')->references('id')->on('asentamientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
