<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pages', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->string('options')->nullable();
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
