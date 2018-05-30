<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_orders', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('order_number')->nullable();
            $table->float('order_total')->nullable()->default(0);
            $table->longText('description')->nullable();
            $table->string('order_status')->nullable()->default('Pending');
            $table->tinyinteger('status')->nullable()->default(1);
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
        //
    }
}
