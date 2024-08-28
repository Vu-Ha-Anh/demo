@extends('Giaodien/trangchu')
@section('main')
<div class="row">
    <div class="col-md-4">
        <h2>Thông tin đặt hàng </h2>
        @if (count($cart->items) > 0)
        <form action="" method="POST" role="form">
        @csrf
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" name="name" value="{{$customer->name}}">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ email</label>
                <input type="text" class="form-control" name="email" value="{{$customer->email}}">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="{{$customer->phone}}">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ giao hàng</label>
                <input type="text" class="form-control" name="address" value="{{$customer->address}}">
            </div>

            <button type="submit" class="btn btn-primary">Đặt hàng</button>
            </form>
        @endif
    </div>
    <div class="col-md-8">
        <h2>Giỏ hàng</h2>

        @if (count($cart->items) > 0)

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $item)
                <tr>
                    <td class="text-center">{{$loop->index + 1}}</td>
                    
                    <td>{{$item->name}}</td>
                    <td>{{ number_format($item->price) }} đ</td>
                    <td>
                        <form action="{{ route('update.cart', $item->ma) }}">
                            <input type="number" name="soluong" value="{{$item->soluong}}"
                                style="width:80px; text-align: center">
                            <button class="btn btn-sm btn-success">Update</button>
                        </form>
                    </td>
                    <td>{{ number_format($item->soluong * $item->price) }}đ</td>
                    <td>
                        <a href="{{ route('huy.cart', $item->ma) }}" class="btn btn-sm btn-danger"
                            onclick="return confirm('Bạn có chắc không?')">Delete</a>
                    </td>
                </tr>
                @endforeach
                    
            </tbody>
            <tr ><td colspan="3"> <h5>Số lượng: {{ $cart->tongsl}}</h5></td></tr>
            <tr><td colspan="5"><h5>Tổng tiền: {{ number_format($cart->tongtien) }} đ </h5></td></tr>
        </table>
                    
        @else
        @if (Session::has('ok'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfully!</strong> Đặt hàng thành công<a href="{{route('order.history')}}">Lịch sử mua hàng</a>
            </div>
            @endif

        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Giỏ hàng rỗng</strong> Giỏ hàng đang rỗng, <a href="{{route('sanpham')}}">hãy click vào đây</a> để tiếp tục mua hàng
        </div>
        @endif
    </div>
</div>

@endsection