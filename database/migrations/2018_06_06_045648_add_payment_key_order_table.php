<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentKeyOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_orders', function (Blueprint $table)
        {
            $table->string('stripe_id')->nullable()->after('description');
            $table->string('balance_transaction')->nullable()->after('stripe_id');
            $table->string('statement_descriptor')->nullable()->after('balance_transaction');
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
