<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenus', function (Blueprint $table) {
            $table->id();
            $table->string('submenu', 20);
            $table->string('href', 20);
            $table->unsignedBigInteger('menu_id');
            $table->softDeletes('deleted_at');
            $table->timestamps();

            // Index
            $table->unique(['submenu', 'menu_id'], 'submenu_menu_unique');

            // Foreign keys
            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submenus', function (Blueprint $table) {
            $table->dropUnique('submenu_menu_unique');
            $table->dropForeign(['menu_id']);
            $table->dropColumn(['menu_id']);
        });

        Schema::dropIfExists('submenus');
    }
}
