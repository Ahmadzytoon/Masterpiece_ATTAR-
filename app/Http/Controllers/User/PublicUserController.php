<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class PublicUserController extends Controller
{

    public function index(){


    // session()->forget('cart');

      if(session()->has('cart')){
        if(Auth()->user()){

            $user_id = Auth()->user()->id;
            $cart = session()->get('cart');
            // بنخزن السشن في التيبل
            foreach ($cart as $key => $value ) {
              // تشييك المنتج اذا كان متواجد في الكارت او لا
                $data = Cart::where('product_id',$key)->where('user_id',$user_id)->get();
                // dd($data);
                if(count($data)==0){
                    // dd(session()->has('cart'));

                Cart::create([
                    'product_id' => $key,
                    'user_id' => $user_id,
                    'quantity' => $value['quantity'],
                    'weight' => $value['weight'],


                ]);
            }

            }
            // نعاود تخزين التكيبل كامل في السشن
            $data = Cart::where('user_id',$user_id)->get();
            session()->forget('cart');
            $cart = session()->get('cart');
            if(count($data)!=0){
                foreach ($data as $value ) {
    
                    $cart[$value->product_id] =[
                      "name" => $value->product->namepro,
                      "quantity" => $value->quantity,
                      "weight" => $value->weight,
    
                    ];
    
    
                }
    
                // dd($cart);
                session()->put('cart', $cart);
            }
        }


    }else{

    // اذا ما كان في سشن واليزر دخل  في وقت ثاني 
        if(Auth()->user()){

            $user_id = Auth()->user()->id;
            $data = Cart::where('user_id',$user_id)->get();

            $cart = session()->get('cart');
            if(count($data)!=0){
                foreach ($data as $value ) {

                    $cart[$value->product_id] =[


                      "name" => $value->product->namepro,
                  "quantity" => $value->quantity,
                  "weight" => $value->weight,

                    ];


                }

                // dd($cart);
                session()->put('cart', $cart);                }



    }
}
        $products = Product::all();
        $category = Category::all();
    

        return view('user.index',['products'=>$products,'category'=>$category,'productsNav'=>$products,'categoryNav'=>$category]);

    }
    public function show(){
        // $data = Activity::all();

        // return view('activities',['data'=>$data]);
        return view('activities');


    }
}