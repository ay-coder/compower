<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Category\Category;
use App\Models\Products\Products;

class GenerateCategorySlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = Category::all();

        foreach($categories as $category)
        {
            $slug = access()->generateSlug($category->title);
            $category->slug = $slug;
            $category->save();
        }

        $products = Products::all();

        foreach($products as $product)
        {
            $slug = access()->generateSlug($product->title);
            $product->slug = $slug;
            $product->save();
        }
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
