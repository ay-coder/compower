<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTestimonials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_testimonials', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('rate')->nullable();
            $table->string('description')->nullable();
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
