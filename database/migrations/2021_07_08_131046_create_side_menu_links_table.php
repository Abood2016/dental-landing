<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSideMenuLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side_menu_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('url', 50);
            $table->string('icon', 50);
            $table->integer('parent_id')->default(0)->nullable();
            $table->integer('order_id');
            $table->tinyInteger('showinmenu')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('side_menu_links');
    }
}
