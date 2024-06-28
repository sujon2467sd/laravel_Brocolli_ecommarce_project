<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Faq;
use App\Models\logo;
use App\Models\Team;
use App\Models\user;
use App\Models\About;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Chosse;
use App\Models\search;
use App\Models\Product;
use App\Models\Service;
use App\Models\OrderItem;
use App\Models\OrderTable;
use App\Models\SubCategory;
use App\Models\maincategory;
use Illuminate\Http\Request;
use App\Models\SingleService;
use App\Models\TopMenuSetting;
use Illuminate\Support\Facades\Auth;






class HomeController extends Controller
{




    public function user_Login(){
        return view('frontend.auth.login');
    }

    public function home($product =null){


        return view('frontend.home.home',[
            'top_menu'=> TopMenuSetting::first(),
           'categories' => maincategory::with('products')->latest()->take(8)->get(),
             'logos' =>logo::first(),
             'banners'=>Banner::where('status','1')->get(),
             'brands'=>Brand::where('status','1')->get(),
             'products'=>Product::orderBy('discount_price', 'desc')
              ->take(5)
              ->get(),

            //   'quieck_product'=>Product::get(),
              'best_sells'=>Product::orderBy('sales','desc')->take(12)->get(),
              'iteams'=>OrderItem::with('product')->get(),
              'latests'=>Product::latest()->take(12)->get(),


        ]);
    }

    public function product_details($id)
    {
        // Fetch the product with its category
        $product = Product::with('category')
                          ->findOrFail($id);

        // Fetch all products in the same category, excluding the current product
        $relatedProducts = Product::where('category_id', $product->category_id)//প্রডাক্ট টেবিলের ক্যাটাগরি আইডি এবং  ($product) ডিটেইলস পেইজের ধরা আইডি যদি সমান হয়।
                                  ->where('id', '!=', $product->id)//this optional // related product again not show
                                  ->take(10)
                                  ->get();

        // Pass the product and related products to the view
        return view('frontend.product_details.details', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    public function search(Request $request){

        $query=$request->input('search');


        // Find product IDs that match the search keywords
        // $searchResults = search::where('search_tag', 'LIKE', "%{$query}%")->pluck('product_id');

        // Find products based on the retrieved product IDs
        // $products = Product::whereIn('id', $searchResults)->get();

        $products = Product::where('name', 'LIKE', "%{$query}%")->get();


        return view('frontend.shop.search',[
            'categories' => Maincategory::get(),
            'products' =>$products,
            'search'=> $query,
        ]);
    }


    public function shop(){

        return view('frontend.shop.shop',[
            'categories' => Maincategory::get(),
            'products' => Product::paginate(10),

        ]);
    }

    public function caetgory_product($id){

                // $product=Product::findOrfail($id);

         return view('frontend.shop.shop',[
            'categories' => Maincategory::get(),
              'products' => Product::where('category_id', $id)->paginate(10),//প্রডাক্ট টেবিলের ক্যাটগরি আইডিগুলো এবং আমাদের ফাস করা আইডি যদি সমান হয়।

        ]);

    }
    public function subcategory_product($id){

                // $product=Product::findOrfail($id);

         return view('frontend.shop.shop',[
            'categories' => Maincategory::get(),
              'products' => Product::where('subcategory_id', $id)->paginate(10),//প্রডাক্ট টেবিলের ক্যাটগরি আইডিগুলো এবং আমাদের ফাস করা আইডি যদি সমান হয়।

        ]);

    }

    public function offer_product(){

        return view('frontend.shop.shop',[

            'categories' => Maincategory::get(),
            'products' => Product::where('discount_price','>=',15)->get(),
        ]);
    }

    public function faq(){
        return view('frontend.faq.faq',[
            'faqs'=>Faq::where('status','1')->get(),
        ]);
    }

    public function SerVice(){
        return view('frontend.service.service',[
            'services'=> Service::where('status', '1')->latestFirst()->get(),
            'single_service'=>SingleService::where('status','1')->get(),
        ]);
    }
    public function Service_details($id){
              $details=SingleService::findOrFail($id);
               return view('frontend.service.service_details',[
                'services'=>  $details,
               ]);
    }


    public function post(){
        return view('admin.post');
    }

    public function about_us(){


        return view('frontend.about.about',[
             'abouts'=>About::where('status','1')->get(),
              'chooses'=>Chosse::where('status','1')->get(),

        ]);
    }



    public function team_us(){
        return view('frontend.about.team',[
            'teams'=>Team::where('status','1')->get(),
        ]);
    }






}