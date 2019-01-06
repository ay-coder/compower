<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataDistributors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_distributors', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('country_id')->nullable();
            $table->string('title')->nullable();
            $table->string('contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('address_line_one')->nullable();
            $table->string('address_line_two')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('skype')->nullable();
            $table->longText('description')->nullable();
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
