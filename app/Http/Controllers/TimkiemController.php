<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TimkiemController extends Controller
{
    //
    public function timkiem(Request $request) {
       
        
        $key = ($request->has('key'))? $request->query('key'):"";
        $key = trim(strip_tags($key));
        $listsp=[];
        if ($key!=""){
            $listsp = DB::table("products")->where("name", "like", "%$key%")->get();
        }
        return view('Giaodien/timkiem', ['key'=> $key , 'listsp'=>$listsp]);
    }
}
