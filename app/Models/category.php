<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    

    protected $table = 'categories';
    public $timestamps = false; 
    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    protected $fillable=['name','status'];
}
