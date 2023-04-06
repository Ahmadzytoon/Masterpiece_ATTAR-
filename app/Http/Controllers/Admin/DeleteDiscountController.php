<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DeleteDiscountController extends Controller
{
    public function deleteDiscountProduct($id){

        $data = Product::findOrfail($id);
        $data->discount = 0;
        $data->price_discount = 0;
        $data->is_sale = 0;

        $data->save();
        return redirect()->route('admin.discount');
    }
}
?>
