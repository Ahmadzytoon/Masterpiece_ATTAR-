<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = ['user_id',
    'name_contact',
    'total_price',
    'email' ,
    'phone',
    'address' ,
    'city',
    'zipcode' ,
    'cardname' ,
    'cardnumber' ,
    'expmonth' ,
    'expyear' ,
    'cvv' ];


    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
