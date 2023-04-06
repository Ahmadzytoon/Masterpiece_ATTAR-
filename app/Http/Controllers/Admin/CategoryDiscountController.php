<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryDiscountController extends Controller
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
        // dd($request->select);
        $request->validate([
            'select_category' => ['required'],
            'discount_category' => ['required'],
        ]);

        $category_id = $request->select_category;
        $products = Product::where('category_id', $category_id)->get();

        // update discount category

        $data = Category::findOrfail($category_id);
        $data->discount = $request->discount_category;

        $data->save();


        // update price of products
        foreach($products as $product){
            $data = Product::findOrfail($product->id);
            $data->discount = $request->discount_category;
            $data->price_discount = $product->price* (1 - $request->discount_category / 100);
            $data->is_sale = 1 ;

            $data->save();
        }

        return redirect()->route('admin.discount');

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
        $data = Category::findOrfail($id);
        return view('admin.discountTable.editCategoryDiscount',['data'=>$data]);
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
            'discount_category' => ['required'],
        ]);

        $category_id = $id;
        $products = Product::where('category_id', $category_id)->get();


        // update discount category

        $data = Category::findOrfail($category_id);
        $data->discount = $request->discount_category;
        $data->save();


        // update price of products
        foreach($products as $product){
            $data = Product::findOrfail($product->id);
            $data->discount = $request->discount_category;
            $data->is_sale = 1;
            $data->price_discount = $product->price* (1 - $request->discount_category / 100);

            $data->save();
        }

        return redirect()->route('admin.discount');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $category_id = $id;
        $products = Product::where('category_id', $category_id)->get();

        // update discount category

        $data = Category::findOrfail($category_id);
        $data->discount = 0;

        $data->save();


        // update price of products
        foreach($products as $product){
            $data = Product::findOrfail($product->id);
            $data->discount = 0;
            $data->is_sale = 0;
            $data->price_discount = 0;

            $data->save();
        }

        return redirect()->back();
    }
}
?>
