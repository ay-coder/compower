<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_notifications', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->longtext('description')->nullable();
            $table->string('icon')->nullable();
            $table->integer('is_read')->nullable();
            $table->datetime('read_time')->nullable();
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
