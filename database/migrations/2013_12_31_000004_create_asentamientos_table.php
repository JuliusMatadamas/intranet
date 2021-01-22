<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsentamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asentamientos', function (Blueprint $table) {
            $table->id();
            $table->string('asentamiento', 57);
            $table->unsignedBigInteger('codigo_postal_id');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['asentamiento', 'codigo_postal_id'], 'unique_asentamiento');

            $table->foreign('codigo_postal_id')->references('id')->on('codigos_postales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asentamientos', function (Blueprint $table) {
            $table->dropForeign(['codigo_postal_id']);
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('asentamientos');
    }
}
