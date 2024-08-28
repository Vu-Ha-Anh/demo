<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $fillable=['price','quantity','product_id','order_id'];
    public function detall() {
        return $this->hasMany(order_detail::class,"order_id","id");
    }
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

}
