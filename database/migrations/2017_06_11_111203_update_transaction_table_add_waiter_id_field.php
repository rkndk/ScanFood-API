<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTransactionTableAddWaiterIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function(Blueprint $table){
            $table->integer('waiter_id')
                  ->unsigned()
                  ->nullable()
                  ->after('partner_id');
            $table->foreign('waiter_id')
                  ->references('id')
                  ->on('waiters')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function(Blueprint $table){
            $table->dropColumn('waiter_id');
        });
    }
}
