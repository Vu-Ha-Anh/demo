@extends('Giaodien/trangchu')
@section('main')
<div class="container">
  <div class="row"> 
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 anh" >
        <img src="/img/{{$sp->img}}" alt="" width="400px" height="400px">
    </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 row3" >
            <div class="yeuthich">
                <p class="yth">Yêu thích</p>
                <h3><p style="margin-left: 30px;"> {{$sp->name}} </p></h3>
            </div>
            <!-- <div class="sale">             
                    <h4>Flash sale 02:42:50</h4>                  
            </div> -->
            <div class="gia">
                        <h5>Giá sản phẩm: {{$sp->price}}đ</h5>
                </div>
            <!-- <div class="khuyenmai">
                <h5>Combo khuyến mãi</h5>
                <div class="km">
                    <p>Mua 2 giảm 3%</p>
                </div>
            </div> -->
                <div class="soluong">
                    
                    <h5>Số lượng:</h5>
                    <div class="sl"><input type="number" value="" name="soluong" class="sluong"></div>
                </div>
                <a href="{{route('add.cart',$sp->id)}}">
                    <button type="submit"class="button"><i class="fas fa-cart-plus"></i>Thêm vào giỏ</button>
                </a>
                <button type="submit">Mua hàng</button>
                <div class="content">
            <h5>Mô tả: </h5>
            <p>{{$sp->content}}</p>
        </div>
            </div>
            
        </div>
        
        
    </div>
@endsection
