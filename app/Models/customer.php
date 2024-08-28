<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class customer extends Authenticatable
{
    protected $table = "customers";
    use HasFactory,Notifiable;
    protected $fillable=['name','email','phone','address','password'];
    public function orders()
    {
        return $this->hasMany(Order::class,'customer_id','id');
    }

}
