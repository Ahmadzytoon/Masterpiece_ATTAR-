<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Blog::all();
        return view('admin.blog.show',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.blog.create');
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
      $data = new Blog;
      $data->title = $request->title;
      $data->short_description = $request->short_description;
      $data->long_description = $request->long_description;
      $data->image = $photoName;
      $data->save();

      return redirect()->route('admin.blog_Admin.index');
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
      $data=Blog::findOrFail($id);
      return view('admin.blog.edit', ['data' =>$data]);
  
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
        'title' => ['required'],
        'short_description' => ['required'],
        'long_description' => ['required'],

    ]);
    // dd($request);
  
      $photoName = $request->file('image')->getClientOriginalName();
      $request->file('image')->storeAs('image', $photoName);
      $data =blog::findOrfail($id);
      $data->title = $request->title;
      $data->short_description = $request->short_description;
      $data->long_description = $request->long_description;
      $data->image = $photoName;
  
      $data->save();
  
      return redirect()->route('admin.blog_Admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Blog::findOrfail($id)->delete();
      return redirect()->route('admin.blog_Admin.index');    }
}
