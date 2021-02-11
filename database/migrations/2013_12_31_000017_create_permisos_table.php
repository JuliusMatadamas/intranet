<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submenu_id');
            $table->unsignedBigInteger('usuario_id');
            $table->softDeletes('deleted_at');
            $table->timestamps();

            // Index
            $table->unique(['submenu_id', 'usuario_id'], 'submenu_user_unique');

            // Foreign keys
            $table->foreign('submenu_id')
                ->references('id')
                ->on('submenus');

            $table->foreign('usuario_id')
                ->references('id')
                ->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->dropForeign(['submenu_id']);
            $table->dropForeign(['usuario_id']);
        });

        Schema::dropIfExists('permisos');
    }
}
