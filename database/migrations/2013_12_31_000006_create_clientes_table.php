<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cliente', 45);
            $table->string('rfc', 20);
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('asentamiento_id');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['cliente', 'empresa_id'], 'unique_cliente');

            $table->foreign('empresa_id')->references('id')->on('empresas');
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
        Schema::dropIfExists('clientes');
    }
}
