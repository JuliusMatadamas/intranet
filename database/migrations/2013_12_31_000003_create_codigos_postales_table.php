<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigosPostalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigos_postales', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_postal', 5)->unique();
            $table->unsignedBigInteger('municipio_id');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['codigo_postal', 'municipio_id'], 'unique_codigo_postal');

            $table->foreign('municipio_id')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('codigos_postales', function (Blueprint $table) {
            $table->dropForeign(['municipio_id']);
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('codigos_postales');
    }
}
