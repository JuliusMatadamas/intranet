<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_largo', 37)->unique();
            $table->string('nombre_corto', 4)->unique();
            $table->unsignedBigInteger('asentamiento_id');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['nombre_corto', 'asentamiento_id'], 'unique_empresa');

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
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropForeign(['asentamiento_id']);
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('empresas');
    }
}
