<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_products', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('category_id')->nullable()->default(null);
            $table->string('title')->nullable();
            $table->string('model')->nullable();
            $table->integer('qty')->nullable()->default(0);
            $table->float('price')->nullable()->default(0);
            $table->integer('stock')->nullable()->default(0);
            $table->longtext('description')->nullable();
            $table->longtext('features')->nullable();
            $table->longtext('specifications')->nullable();
            $table->string('chart_1')->nullable()->default('default.png');
            $table->string('chart_2')->nullable()->default(null);
            $table->string('chart_3')->nullable()->default(null);
            
            $table->string('pdf_1')->nullable()->default(null);
            $table->string('pdf_title_1')->nullable()->default(null);

            $table->string('pdf_2')->nullable()->default(null);
            $table->string('pdf_title_2')->nullable()->default(null);

            $table->string('pdf_3')->nullable()->default(null);
            $table->string('pdf_title_3')->nullable()->default(null);

            $table->string('image_1')->nullable()->default('default.png');
            $table->string('image_2')->nullable()->default(null);
            $table->string('image_3')->nullable()->default(null);
            $table->string('image_4')->nullable()->default(null);
            $table->string('image_5')->nullable()->default(null);
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
