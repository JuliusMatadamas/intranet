<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('municipio', 49);
            $table->unsignedBigInteger('estado_id');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['municipio', 'estado_id'], 'unique_municipio');

            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('municipios', function (Blueprint $table) {
            $table->dropForeign(['estado_id']);
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('municipios');
    }
}
