@extends('Giaodien/trangchu')
@section('main')
<h2>Danh sách đơn hàng đã giao dịch</h2>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Ngày mua</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($customer->orders as $order)
        <tr>
            <td class="text-center">{{$loop->index + 1}}</td>
            <td>{{$order->created_at->format('d/m/yy')}}</td>
            <td{{ number_format( $order->totalPrice() ) }} đ</td>
            <td>
                @if ($order->status == 0)
                <span class="label label-warning">Chờ duyệt</span>
                @elseif ($order->status == 1)
                <span class="label label-primary">Đã duyệt</span>
                @elseif ($order->status == 2)
                <span class="label label-success">Đã hoàn thành</span>
                @else
                <span class="label label-danger">Đã hủy</span>
                @endif
            </td>

            <td>
                <a href="{{ route('order.detail', $order->id) }}" class="btn btn-sm btn-primary">Chi tiết</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection