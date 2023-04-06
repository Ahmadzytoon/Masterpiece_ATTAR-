<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){
        $category=Category::all();

        $products=Product::all();



        return view('admin.discountTable.show',['category'=>$category,'products'=>$products]);

    }
    public function addDiscount(){
        $category=Category::all();

        $products=Product::all();



        return view('admin.discountTable.addDiscount',['category'=>$category,'products'=>$products]);

    }

}
?>
