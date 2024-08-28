<?php
namespace App\Cart;
class Cart {
    public $items=[];
    public $tongsl=0;
    public $tongtien=0;
    //khởi tạo thuộc tính
     public function __construct(){
        //session()->forget('cart');
        $this->items=session('cart')?session('cart'):[];
        $this->tongsl=$this->tinhtongsl();
        $this->tongtien=$this->tinhtongtien();
     }
     public function Add ($sp,$sl){
        $id=$sp->id;
        if (isset($this->items[$id])){
            $this->items[$id]->soluong+=1;
        }
        else{
            $item=[
                'ma'=>$id,
                'name'=>$sp->name,
                'img' => $sp->img,
                'price'=>$sp->price,
                'soluong'=>$sl,
            ];
            $this->items[$id]=(object)$item;
        }
       
        session(['cart'=>$this->items]);
    
     }
     public function Delete($id){
        if(isset($this->items[$id])){
            unset($this->items[$id]);
            session(['cart'=>$this->items]);
        }
     }
     public function Update($id,$sl){
        if(isset($this->items[$id])){
            $this->items[$id]->soluong=$sl;
            session(['cart'=>$this->items]);
        }
     }
     public function Clear(){
        session(['cart'=>null]);
     }
     private function tinhtongsl(){
        $tong=0;
        foreach($this->items as $item){
            $tong+=$item->soluong;
        }
        return $tong;
     }
     private function tinhtongtien(){
        $tong=0;
        foreach($this->items as $item){
            $tong+=($item->soluong*$item->price);
        }
        return $tong;
     }
     
     
}