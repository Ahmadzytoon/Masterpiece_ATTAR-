<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $number_of_admin =User::where('role','admin')->count();
      $number_of_users =User::where('role','user')->count();
      $number_of_category =Category::all()->count();
      $number_of_messages =Contact::all()->count();
      $number_of_Comment =Comment::all()->count();


      $Last_request_date =Order::all()->first();

      
      $number_of_product =Product::all()->count();
      $number_of_orders =Order::all()->count();
      $number_of_Blog =Blog::all()->count();
      $number_of_product_offered =Product::where('is_sale' , '=' , 1)->count();


      return view('admin.dashboard',['number_of_admin'=>$number_of_admin ,'number_of_users'=>$number_of_users ,'number_of_category'=>$number_of_category,'number_of_messages'=>$number_of_messages,'number_of_product'=>$number_of_product,'number_of_orders'=>$number_of_orders,'number_of_product_offered'=>$number_of_product_offered,'number_of_Comment'=>$number_of_Comment,'number_of_Blog'=>$number_of_Blog,'Last_request_date'=>$Last_request_date]);


}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.addadmin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $photoName = $request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('public/image', $photoName);
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'phone' => ['required', 'max:10' ,'min:10','unique:'.User::class],
        'password' => ['required', Rules\Password::defaults()],
        'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif', 'max:2048'],

    ]);
    $user=User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'image' => $photoName,
        'password' => Hash::make($request->password),
        'role' => 'Admin',

    ]);
    event(new Registered($user));


    return redirect()->route('admin.users.index');
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
      $data=User::where('id',$id)->first();
      return view('admin.editprofile.editProfile',['data'=>$data]);
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
        
      $request->validate([
        'name' => ['required'],
        'email' => ['required'],
        'password' => ['required', Rules\Password::defaults()],
        'phone' => ['required'],

    ]);

    $user=User::findorFail($id);
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=Hash::make($request->password);
    $user->phone=$request->phone;

    if ( $request->file('image')) {
        $photoName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/image', $photoName);
        $user->image=$photoName;

    }
// dd($user);
    $user->save();
    return redirect()->route('admin.index');

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
