<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function search(Request $request)
  {
      $search = $request->input('search');
      $products = Product::query()
          ->where('namepro', 'like', '%'.$search.'%')
          ->orWhere('short_description', 'like', '%'.$search.'%')
          ->orWhere('long_description', 'like', '%'.$search.'%')
          ->orWhere('discount', 'like', '%'.$search.'%')
          ->get();
          // dd($products);
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
          'is_sale' => $product->is_sale,
  
  
        ];
      }
      $productsnav = Product::all();
      $category = Category::all();
      return view('user.search',['products'=>$data,'category'=>$category,'productsNav'=>$productsnav,'categoryNav'=>$category]);
      
  }
}
?>
