<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = Category::get();

    return view('admin.category.show', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.category.create');
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
      'name_category' => ['required'],
      'description' => ['required'],
      'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif', 'max:2048'],

    ]);
    $category_img = $request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('public/image', $category_img);

    // insert category
    $categories = new Category();
    $categories->name_category = $request->name_category;
    $categories->description = $request->description;
    $categories->image = $category_img;
    $categories->save();

    return redirect()->route('admin.category.index');
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
    // if (count(Category::all()) < $id || $id < 0) {
    //   return redirect()->back();
    // }
    return view('admin.category.edit', ['data' => Category::findOrFail($id)]);
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
      'name_category' => ['required'],
      'description' => ['required'],
      'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif', 'max:2048'],

    ]);
    $photoName = $request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('public/image', $photoName);
    $category = Category::findorFail($id);
    $category->name_category = $request->name_category;
    $category->description = $request->description;
    $category->image = $photoName;

    $category->save();
    return redirect()->route('admin.category.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Category::findorFail($id)->delete();
    return redirect()->route('admin.category.index');
  }
}