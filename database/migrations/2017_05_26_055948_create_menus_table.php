<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id')
                  ->references('id')
                  ->on('partners')
                  ->onDelete('cascade');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');
            $table->integer('promo_id')->unsigned()->nullable();
            $table->foreign('promo_id')
                  ->references('id')
                  ->on('promos')
                  ->onDelete('set null');
            $table->string('name');
            $table->integer('price')->unsigned();
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->boolean('available')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}