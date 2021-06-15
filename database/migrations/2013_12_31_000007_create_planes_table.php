<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('cliente_id');
            $table->string('nombre', 255)->unique();
            $table->date('inicia')->nullable();
            $table->date('termina')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['empresa_id', 'cliente_id', 'nombre'], 'unique_plan');

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planes');
    }
}

