<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class   ProductDiscountController extends Controller
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


        $request->validate([
            'select_product' => ['required'],
            'discount_product' => ['required'],
        ]);
        $product_id = $request->select_product;

        $data = Product::findOrfail($product_id);
        $data->discount = $request->discount_product;
        $data->is_sale =1;
        $data->price_discount = $data->price * (1 - $request->discount_product / 100);

        $data->save();
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
        $data = Product::findOrfail($id);
        return view('admin.discountTable.editCoursesDiscount',['data'=>$data]);
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
            'discount_product' => ['required'],
        ]);

        $product_id = $id;

        $data = Product::findOrfail($product_id);
        $data->discount = $request->discount_product;
        $data->is_sale = 1;
        $data->price_discount = $data->price * (1 - $request->discount_product / 100);

        $data->save();
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
        $data = Product::findOrfail($id);
        $data->discount = 0;
        $data->price_discount = 0;
        $data->is_sale = 0;

        $data->save();
        return redirect()->route('admin.discount');
    }
}
?>
