<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $products = Product::with('category')->get();
    $data = [];
    foreach ($products as $product) {
      $data[] = [
        'id' => $product->id,
        'namepro' => $product->namepro,
        'short_description' => $product->short_description,
        'long_description' => $product->long_description,
        'price' => $product->price,
        'image' => $product->image,
        'unit' => $product->unit,
        'price_discount' => $product->price_discount,
        'name_category' => isset($product->category) ? $product->category->name_category : "",


      ];
    }

    return view('admin.product.show',['data'=> $data]);


  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
  
    $category=Category::all();

    return view('admin.product.create',['category'=>$category]);

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
  //   $request->validate([
  //     'namepro' => ['required'],
  //     'category_id' => ['required'],
  //     'short_description' => ['required'],
  //     'long_description' => ['required'],
  //     'price' => ['required'],
  //     'name_category' => ['required'],
  //     'image' => ['required','image','mimes:jpg,png,jpeg,gif','max:2048'],
  // ]);

// dd( $request->name_category);
    $photoName = $request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('public/image', $photoName);



    $data = new Product;
    $data->category_id = $request->name_category;
    $data->namepro = $request->namepro;
    $data->short_description = $request->short_description;
    $data->long_description = $request->long_description;
    $data->unit = $request->unit;
    $data->price = $request->price;
    $data->image = $photoName;

    $data->save();

    return redirect()->route('admin.products.index');
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
    $category=Category::all();
    $data=Product::findOrFail($id);
    return view('admin.product.edit', ['data' =>$data ,'category'=>$category ]);



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
// dd($id);category_id

    $request->validate([
      'namepro' => ['required'],
      'short_description' => ['required'],
      'long_description' => ['required'],
      'price' => ['required'],
      'category_id' => ['required'],
      'unit' => ['required'],
      'image' => ['required','image','mimes:jpg,png,jpeg,gif','max:2048'],
  ]);
  // dd($request);

    $photoName = $request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('image', $photoName);
    $data =Product::findOrfail($id);
    $data->category_id = $request->category_id;
    $data->namepro = $request->namepro;
    $data->short_description = $request->short_description;
    $data->long_description = $request->long_description;
    $data->price = $request->price;
    $data->unit = $request->unit;
    $data->image = $photoName;

    $data->save();

    return redirect()->route('admin.products.index');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Product::findOrfail($id)->delete();
    return redirect()->route('admin.products.index');

  }
}