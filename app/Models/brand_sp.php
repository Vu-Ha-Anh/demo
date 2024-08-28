<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand_sp extends Model
{
    use HasFactory;
    protected $table = 'brand_sps';
    
    public $timestamps = false; 
    public function products(){
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    protected $fillable=['name','status'];
}
