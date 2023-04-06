<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $fillable = [
    'namepro',
    'short_description',
    'long_description',
    'image',
    'price',
    'category',
    'price_discount',
    'is_sale',
    'discount',

  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}