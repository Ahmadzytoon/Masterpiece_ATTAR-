<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\order_details;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categorynav = Category::all();
      $productsnav = Product::all();
        return view("user.profile",['productsNav'=>$productsnav,'categoryNav'=>$categorynav]);
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
      $data=order_details::where('user_id',$id)->get();
      // dd($data);
      $categorynav = Category::all();
      $productsnav = Product::all();
      return view('user.OrderProfile',['data'=>$data,'productsNav'=>$productsnav,'categoryNav'=>$categorynav]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
      $data = User::where('id',$id)->get();
      $categorynav = Category::all();
      $productsnav = Product::all();
      // dd($data);
        return view('user.edit_profile',['data'=>$data ,'productsNav'=>$productsnav,'categoryNav'=>$categorynav]);
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
      $data = User::findOrfail($id);
      $email=$data->email;
      $phone=$data->phone;
// dd($request->phone);

      $request->validate([
          'name' => ['required'],
          // 'phone' => ['required', 'max:10' ,'min:10','unique:'.User::class],
          // 'password' => ['required', 'min:8'],
          // 'update_image' => ['required','image','mimes:jpg,png,jpeg,gif','max:2048'],
      ]);




      $data->name = $request->name;  //id لانه هون انا موجودة عندي البيانات من خلال ال  new model ما عملت هون
      if($email !==$request->email){
          $request->validate([
              'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],

          ]);

          $data->email = $request->email;
      }
      if($phone !=$request->phone){
          $request->validate([
              'phone' => ['required', 'max:10' ,'min:9','unique:'.User::class],

          ]);

          $data->phone = $request->phone;
      }
      if ( $request->file('update_image')) {
          $photoName = $request->file('update_image')->getClientOriginalName();
          $request->file('update_image')->storeAs('public/image', $photoName);
          $data->image = $photoName;

      }
      if ( $request->password) {
          $data->password = Hash::make($request->password);
      }

      $data->save();
      //-------------------------------

      return redirect()->route('user.profile.index');
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
