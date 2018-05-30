<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataOrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_order_items', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('order_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('qty')->nullable()->default(0);
            $table->float('price')->nullable()->default(0);
            $table->string('shipping_date')->nullable();
            $table->string('expected_shipping_date')->nullable();
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
