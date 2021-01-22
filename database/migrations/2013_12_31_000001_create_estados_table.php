<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('estado', 19)->unique();
            $table->unsignedBigInteger('pais_id');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['estado', 'pais_id'], 'unique_estado');

            $table->foreign('pais_id')->references('id')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estados', function (Blueprint $table) {
            $table->dropForeign(['pais_id']);
            $table->dropColumn('pais_id');
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('estados');
    }
}
