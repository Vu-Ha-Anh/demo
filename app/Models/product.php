<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;  
    public function cate(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function brand(){
        return $this->hasOne(brand_sp::class, 'id', 'brand_id');
    }
    protected $fillable=['name','price','sale_price','img','content','brand_id','category_id','status'];
}
