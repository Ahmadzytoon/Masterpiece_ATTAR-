<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\order_details;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


  public function __construct()
  {
      $this->middleware('CheckLogin');
      
  }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // dd(session('total_price'));
        if(session('total_price')!=0){
          $categorynav = Category::all();
          $productsnav = Product::all();
            return view('user.checkout',['productsNav'=>$productsnav,'categoryNav'=>$categorynav]);
        }else{
            return redirect()->back();

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name_contact' => ['required'],
        'email' => ['required','string', 'email', 'max:255'],
        'address' => ['required'],
        'phone' => ['required'],
        'city' => ['required'],
        'zipcode' => ['required'],
        'cardname' => ['required'],
        'cardnumber' => ['required'],
        'expyear' => ['required','numeric'],
        'expmonth' => ['required','numeric'],
        'cvv' => ['required','numeric'],

    ]);
    $user_id = Auth()->user()->id;
    $total_price=session('total_price');

    $last_order = Order::create([

        'user_id' => $user_id,
        'total_price' => $total_price,

        'name_contact' => $request->name_contact,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'city' => $request->city,
        'zipcode' => $request->zipcode,
        'cardname' => $request->cardname,
        'cardnumber' => $request->cardnumber,
        'expmonth' => $request->expmonth,
        'expyear' => $request->expyear,
        'cvv' => $request->cvv,



    ]);

    $last_order_id = $last_order->id;

    $data_cart = Cart::where('user_id', $user_id)->get();

    $data = [];
      foreach ($data_cart as $value) {
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


    foreach($data as $value){

        if($value['is_sale']==1){
            $price= $value['product_price'];
        }else{
            $price= $value['product_price_discount'];
        }
        order_details::create([

            'order_id' => $last_order_id,
            'user_id' => $user_id,
            'product_id' => $value['product_id'],
            'quantity' => $value['product_id'],
            'weight' => $value['weight'],
            'price' =>$price,


        ]);
    }

    Cart::where('user_id', $user_id)->delete();
    session()->forget('cart');
    session()->forget('total_price');




    // return redirect()->route('user.profile_user.index');
    return redirect()->route('user.profile.index')->with('success','We thank you for your trust in our website. We hope that you will get the most out of this course. Sections of the course can be viewed from the main page of the course at any time you want.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
