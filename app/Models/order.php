<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','name','email','phone','address','status','quantity','token'];
    public function details()
    {
        return $this->hasMany(order_detail::class, 'order_id','id');
    }

    public function totalPrice()
    {
        $total = 0;
        foreach ($this->details as $item) {
            $total += $item->quantity * $item->price;
        }

        return $total;
    }
}
