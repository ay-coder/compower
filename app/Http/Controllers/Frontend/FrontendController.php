<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners\Banners;
use App\Models\Category\Category;
use App\Models\Products\Products;
use App\Models\Blogs\Blogs;
use App\Models\DistributorCountries\DistributorCountries;
use App\Models\TechCategories\TechCategories;
use App\Models\Access\User\User;
use App\Models\Cart\Cart;
use App\Repositories\Cart\EloquentCartRepository;
use App\Models\Orders\Orders;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $banners = Banners::where('status' , 1)->with('category')->get();
        return view('frontend.index')->with([
            'banners' => $banners
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function complianceTesting()
    {
        return view('frontend.compliance-testing');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function distributor()
    {
        $countries = DistributorCountries::with('distributors')->orderBy('title')->get();

        return view('frontend.distributor')->with([
            'countries' => $countries
        ]);
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function career()
    {
        return view('frontend.career');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function techNotes()
    {
        $notes = TechCategories::all();
        
        return view('frontend.tech-notes')->with([
            'notes' => $notes
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function repairServiceRequest()
    {
        return view('frontend.repair-service-request');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function callServiceRequest()
    {
        return view('frontend.call-service-request');
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function showCategoryProducts($slug, Request $request)
    {
        $category = Category::with('products')->where('slug', $slug)->first();
        
        return view('frontend.category-products')->with([
            'category' => $category
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function showProduct($slug, Request $request)
    {
        $product = Products::with('category')->where('slug', $slug)->first();
        
        return view('frontend.product')->with([
            'product' => $product
        ]);
    }

    /**
     * Place Order
     * 
     * @param Request $request
     * @return mixed
     */
    public function placeOrder(Request $request)
    {
        $userInfo   = access()->user();
        $cartObj    = new EloquentCartRepository;
        $userCart   = $cartObj->getUserCart($userInfo->id);
        $order      = new Orders;

        if(isset($userCart) && count($userCart))
        {
            $orderItems = [];
            $orderTotal = 0;

            foreach($userCart as $item)
            {
                $orderTotal = $orderTotal + ($item->qty * $item->product->price);

                $orderItems[] = [
                    'product_id'                => $item->product->id,
                    'qty'                       => $item->qty,
                    'price'                     => $item->product->price,
                    'shipping_date'             => date('Y-m-d'),
                    'expected_shipping_date'    => date('Y-m-d')
                ];
            }

            $orderInfo = [
                'user_id'           => $userInfo->id,
                'order_number'      => rand(11111, 99999),
                'order_total'       => $orderTotal,
                'description'       => 'This is test ',
                'order_status'      => 'Pending'
            ];

            $orderInfo = $order->create($orderInfo);

            $orderItems = array_map(function($item) use($orderInfo) {
                $item['order_id'] = $orderInfo->id;
                return $item;
            }, $orderItems);

            $status = $orderInfo->order_items()->insert($orderItems);

            if($status)
            {
                // Clear Cart Object
                $cartObj->clearUserCart($userInfo->id);

                return redirect()->route('frontend.index')->withFlashSuccess('Order Placed Successfully!');
            }
        }
    }
    

    /**
     * @return \Illuminate\View\View
     */
    public function showAllCategories()
    {
        $categories = Category::get();
        
        return view('frontend.show-all-categories')->with([
            'categories' => $categories
        ]);
    }

    /** Blog
     *
     * @return \Illuminate\View\View
     */
    public function blog()
    {
        $blogs = Blogs::get();
        
        return view('frontend.blog')->with([
            'blogs' => $blogs
        ]);
    }

    public function getQuote()
    {
        return view('frontend.get-a-quote');
    }

    /**
     * My Orders
     * 
     * @return mixed
     */
    public function myOrders()
    {
        $currentUser = access()->user();

        $user = User::where('id', $currentUser->id)->with(['user_orders', 'user_orders.order_items', 'user_orders.order_items.product'])->first();

        return view('frontend.my-order')->with([
            'user' => $user
        ]);
    }

    /**
     * My Wish list
     * 
     * @return mixed
     */
    public function myWishlist()
    {
        return view('frontend.my-wishlist');
        
    }

    /**
     * My Cart
     * 
     * @return mixed
     */
    public function myCart()
    {
        $currentUser = access()->user();

        $user = User::where('id', $currentUser->id)->with(['user_cart', 'user_cart.product'])->first();

        return view('frontend.my-cart')->with([
            'user' => $user
        ]);
    }

    /**
     * Quote Request
     * @param  Request $request
     * @return die
     */
    public function quoteRequest(Request $request)
    {
        dd($request->all());

    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }

    /**
     * Remove Cart Product
     * @param  Request $request
     * @return mixed
     */
    public function removeCartProduct(Request $request)
    {
        if($request->has('cartId'))
        {
            $status = Cart::where('id', $request->get('cartId'))->delete();

            if($status)
            {
                return json_encode([
                    'status' => true
                ]);
            }
        }

        return json_encode([
            'status' => false
        ]);
    }

    /**
     * Update Cart Product
     * 
     * @param Request $request
     * @return mixed
     */
    public function updateCartProduct(Request $request)
    {
        if($request->has('cartId'))
        {
            $status = Cart::where('id', $request->get('cartId'))->update([
                'qty' => $request->get('cartValue')
            ]);

            if($status)
            {
                return json_encode([
                    'status' => true
                ]);
            }
        }

        return json_encode([
            'status' => false
        ]);
    }

    /**
     * Add Product To Cart
     * 
     * @param Request $request
     */
    public function addProductToCart(Request $request)
    {
        if(!access()->user())
        {
            return redirect()->route('frontend.index')->withFlashDanger('Please Login to Continue!');
        }

        if($request->has('productId'))
        {
            $userId     = access()->user()->id;
            $isExist    = Cart::where([
                'user_id'       => $userId,
                'product_id'    => $request->get('productId')
            ])->first();

            if(isset($isExist) && isset($isExist->id))
            {
                return json_encode([
                    'status' => false
                ]);   
            }

            $status = Cart::create([
                'user_id'       => $userId,
                'product_id'    => $request->get('productId')
            ]);
            
            if($status)
            {
                return json_encode([
                    'status' => true
                ]);
            }
        }

        return json_encode([
            'status' => false
        ]);
    }
}
