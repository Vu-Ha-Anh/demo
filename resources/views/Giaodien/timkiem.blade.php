@extends('Giaodien/trangchu')
@section('main')
    
    <div class="container-fluid row2">
    <div class="row row5">
        <h2>Tìm kiếm:{{$key}}</h2>
        @foreach ($listsp as $row)
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 abc">
                <a href="chitiet/{{\Str::slug($row->name)}}_{{$row->id}}">
                    <img src="/img/{{$row->img}}" alt="" width="100%" height="270px">
                </a>
                <div class="text">
                    <a href="chitiet/{{\Str::slug($row->name)}}_{{$row->id}}">
                        <h5 class="chu">{{\Str::limit($row->name,20)}}</h5>
                    </a>
                    <p>{{$row->sale_price}}vnđ  <del>{{$row->price}}vnđ</del></p>
                    <a href="{{route('add.cart',$row->id)}}">
                        <button type="submit"class="button"><i class="fas fa-cart-plus"></i>Thêm vào giỏ</button>
                    </a>
                </div>
            </div>
        @endforeach 
    </div>
    </div>
    
@endsection