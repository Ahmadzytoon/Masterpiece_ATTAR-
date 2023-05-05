<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContuctController extends Controller
{
  public function createForm() {

    $data=contact::all();


    return view('admin.contact.show',['data'=>$data]);

}

public function destroy($id)
{
Contact::findOrfail($id)->delete();
  return redirect()->route('contact.createForm');
}
}

