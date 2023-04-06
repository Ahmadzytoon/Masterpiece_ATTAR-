<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContuctController extends Controller
{
  public function createForm() {

    $data=contact::all();


    return view('admin.contact.show',['data'=>$data]);

}

   


    // Store Contact Form data
    public function ContactUsForm(Request $request) {

      // Form validation
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'phoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
          'subject'=>'required',
          'message' => 'required'
       ]);

      //  Store data in database
      Contact::create($request->all());


  return redirect()->route('user.contact')->with('success', 'We have received your message and would like to thank you for writing to us.');

}

public function destroy($id)
{
Contact::findOrfail($id)->delete();
  return redirect()->route('contact.createForm');
}
}

