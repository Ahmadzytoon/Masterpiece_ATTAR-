<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class UpdateOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
      if (Auth()->user()) {

        $user_id = Auth()->user()->id;
        // dd($id);
    
    
        $data = Cart::where('user_id',$user_id)->where('product_id',$id)->first();
        $data->quantity=$request->quantity;
        if($request->weight){
          $data->weight=$request->weight;
        }
        
        
        $data->save();
                    // dd($data);
    
        // $data->save();
    
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
                // return redirect()->back();
    
                return redirect()->route('user.cart');
    
        }
        else{
          $cart = session()->get('cart');
      
                  $cart[$id]['quantity']=$request->quantity;
                  $cart[$id]['weight']=$request->weight;
                
      
      
              
      
              // dd($cart);
              session()->put('cart', $cart);
              return redirect()->route('user.cart');
        }
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