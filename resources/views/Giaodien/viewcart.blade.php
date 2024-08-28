@extends('Giaodien/trangchu')
@section('main')
<div class="container mt-3">
  <h2>Giỏ hàng</h2>        
  <div class="row">   
  <table class="table">
    <thead>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cart->items as $row)
        <form action="{{route('update.cart')}}" method="post">
          <tr>
            <td>{{$row->name}}</td>
            <td><img src="/img/{{$row->img}}" alt="" width="100px" height="100px"></td>
            <td>
              <input type="number" value="{{$row->soluong}}" name="soluong">
              <input type="hidden" value="{{$row->ma}}" name="ma">
            </td>
            <td>{{$row->price}}</td>
            <td>{{$row->soluong*$row->price}}</td>
            <td>
                <button type="submit" class="btn btn-success">Cập nhật</button>
                <a href="{{route('xoa.cart',$row->ma)}}" class="btn btn-danger">Xóa</a>
            </td>  
          </tr>
          
      @METHOD("PUT")
      @csrf
      </form>
    @endforeach
    </tbody>
  </table>
  <td >Tổng số lượng: {{ $cart->tongsl}} </td>
          <td>Tổng tiền hàng: {{ number_format($cart->tongtien) }}</td>
  <div>
  <a href="{{route('huy.cart')}}" class="btn btn-danger">Hủy đơn </a>
  <a href="{{route('sanpham')}}"  class="btn btn-info">Mua hàng</a>
  <a href="{{route('order.checkout')}}" class="btn btn-primary">Đặt hàng</a></div>
</div>
</div>
@endsection