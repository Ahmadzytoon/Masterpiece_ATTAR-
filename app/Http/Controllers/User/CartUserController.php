<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class CartUserController extends Controller
{
  public function index()
  {
    // dd(session()->all());
    if (Auth()->user()) {

      $user_id = Auth()->user()->id;

      $DATA = Cart::where('user_id', $user_id)->get();

      $data = [];
      foreach ($DATA as $value) {
        $data[] = [
          'id' => $value->id,
          'quantity' => $value->quantity,
          'weight' => $value->weight,
          'product_id' => isset($value->product) ? $value->product->id : "",
          'product_name' => isset($value->product) ? $value->product->namepro : "",
          'product_price' => isset($value->product) ? $value->product->price : "",
          'product_price_discount' => isset($value->product) ? $value->product->price_discount : "",
          'is_sale' => isset($value->product) ? $value->product->is_sale : "",
          'product_image' => isset($value->product) ? $value->product->image : "",
        ];
      }
      // dd($data);
      $category = Category::all();
      $productsnav = Product::all();
      return view('user.cart',['data' => $data,'productsNav'=>$productsnav,'categoryNav'=>$category]);
    } 
    else {
      $cart = session()->get('cart');
      $array_id = [];
      if ($cart) {

        // foreach ($cart as $key => $value) {
        //   array_push($array_id, $key);
        // }
        // dd($array_id);
        $data = [];
        foreach ($cart as $key => $value) {
          $DATA = Product::where('id', $key )->get();
          foreach ($DATA as $product) {
            $data[] = [
              
              'product_id' => $product->id,
              'quantity' => $value['quantity'],
              'weight' => $value['weight'],
              'product_name' => $product->namepro,
              'product_price' => $product->price,
              'product_price_discount' => $product->price_discount,
              'is_sale' => $product->is_sale,
              'product_image' => $product->image,

            ];
          }
        }
        // dd($data);
        $category = Category::all();
        $productsnav = Product::all();
        return view('user.cart', ['data' => $data,'productsNav'=>$productsnav,'categoryNav'=>$category]);
      } else {

        $data = [];
        $category = Category::all();
        $productsnav = Product::all();
        return view('user.cart', ['data' => $data,'productsNav'=>$productsnav,'categoryNav'=>$category]);
      }
    }
  }
  // _________________________________________________________
  public function addToCart(Request $request ,$id)
  {
// dd($id);
// dd($request->waight);
// session()->forget('cart');
// dd(session('cart'));
// dd($id);
    // session()->forget('cart');
    // return redirect()->back();
    $product = Product::find($id);


    // $user_id = Auth()->user()->id;
    // $course = Course::find($id);
    // if(!$course) {
    //     abort(404);
    // }

    $cart = session()->get('cart');
    // if cart is empty then this the first product
    if (!$cart) {
      if ($product->unit == "weight") {
        $quantity = $request->quantity;
        $weight = $request->waight;
      } else {

        $quantity = $request->quantity;
        $weight = 0;
      }
      if ($product->is_sale == 1) {
        
        $price = $product->price_discount;
      } else {
        $price = $product->price;
      }
      if ($product->unit == "weight") {
        $price = ($price * $request->waight)/1000;
      }
      $cart = [
        $id => [
          "name" => $product->namepro,
          "quantity" => $quantity,
          "price" => $price,
          "weight" => $weight,
        ]
      ];

      
      session()->put('cart', $cart);

// dd(session('cart'));
// dd('ahmad');




if (Auth()->user()) {

        $user_id = Auth()->user()->id;
        if ($product->unit == "weight") {
          $quantity = $request->quantity;
          $weight = $request->waight;
        } else {

          $quantity = $request->quantity;
          $weight = 0;
        }
        Cart::create([

          'product_id' => $id,
          'user_id' => $user_id,
          'quantity' => $quantity,
          'weight' => $weight

        ]);
      }
      return redirect()->back()->with('success', 'Product added to cart successfully!');
    }




    // if cart not empty then check if this product exist then increment quantity
    if (isset($cart[$id])) {

      dd('dzdvdvvs');
      return redirect()->back()->with('failed', 'Product added to cart successfully!');
    }
    // if item not exist in cart then add to cart with quantity = 1



    if ($cart) {
      if ($product->unit == "weight") {
          $quantity = $request->quantity;
          $weight = $request->waight;
      } else {

        $quantity = $request->quantity;
        $weight = 0;
      }
      if ($product->is_sale == 1) {
        $price = $product->price_discount;
      } else {
        $price = $product->price;
      }
      if ($product->unit == "weight") {
        $price = ($price * $request->waight)/1000;
      }
      $cart[$id] = [
        "name" => $product->namepro,
        "quantity" => $quantity,
        "price" => $price,
        "weight" => $weight,
    
      ];
      session()->put('cart', $cart);

      if (Auth()->user()) {


        $user_id = Auth()->user()->id;
        if ($product->unit == "weight") {
          $quantity = $request->quantity;
          $weight = $request->waight;
        } else {

          $quantity = $request->quantity;
        $weight = 0;
        }
        Cart::create([

          'product_id' => $id,
          'user_id' => $user_id,
          'quantity' => $quantity,
          'weight' => $weight


        ]);
      }

      return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  }



  public function destroy($id)
  {
    if ($id) {
      $cart = session()->get('cart');
      // dd($cart);
      if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
        if (Auth()->user()) {
          $user_id = Auth()->user()->id;

          Cart::where('product_id', $id)->where('user_id', $user_id)->delete();
        }
      } else {
        $user_id = Auth()->user()->id;

        Cart::where('product_id', $id)->where('user_id', $user_id)->delete();
      }
      return redirect()->back();
      // session()->flash('success', 'Product removed successfully');
    }
  }

}