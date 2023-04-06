<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

      return view('admin.dashboard');


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
