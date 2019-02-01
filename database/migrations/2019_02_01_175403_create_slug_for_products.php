<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Products\Products;

class CreateSlugForProducts extends Migration
{
	/**
	 * Get All Products
	 * 
	 * @return object
	 */
	public function getAllProducts()
	{
		return Products::all();
	}

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $allProducts = $this->getAllProducts();
       	$sr 		 = 0;

        foreach($allProducts as $product)
        {
        	$slug = $this->generateSlug($product);

        	$product->slug = $slug;
        	$product->save();

        	$sr++;
        }

        echo "Total $sr Records Updated!";
    }

    /**
     * Generate Slug
     * 
     * @param object $product
     * @return string
     */
    public function generateSlug($product)
    {
    	$slug = strtolower(str_replace(' ', '-', $product->title));

    	$isExists = Products::where('slug', $slug)->first();

    	if(isset($isExists) && isset($isExists->id))
    	{
    		$slug = $slug . strtolower(str_replace(' ', '-', $product->model));

    		$isModelExists = Products::where('slug', $slug)->first();

    		if(isset($isModelExists) && isset($isModelExists->id))
    		{
    			$slug = $slug . rand(111, 999);
    		}

    		return $slug;
    	}

    	return $slug;
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
