<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('puesto_id');
            $table->double('sueldo', 8, 2);
            $table->date('alta');
            $table->date('baja');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['empleado_id', 'plan_id', 'puesto_id'], 'unique_contrato');

            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('plan_id')->references('id')->on('planes');
            $table->foreign('puesto_id')->references('id')->on('puestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
