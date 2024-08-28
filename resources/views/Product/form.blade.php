@extends('Admin/admin')
@section('main')
    <div class="container-fluid">
        <a href="{{route('them')}}" class="btn btn-primary">Thêm sản phẩm</a>
        <div >{{$sp->links()}}</div>
        <div class="link">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Sale </th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Thương hiệu</th>
                    <th>Phân loại</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sp as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->sale_price}}</td>
                        <td><img src="/img/{{$row->img}}" alt="" width="100px" height="100px"></td>
                        <td>{{$row->content}}</td>
                        <td>{{$row->brand->name}}</td>
                        <td>{{$row->cate->name}}</td>
                        <td>{{$row->status==0? 'Sản phẩm mới':'Sản phẩm cũ'}}</td>
                        <td>
                            <form action="" method="post">
                                <a href="{{route('sua',$row->id)}}" class="btn btn-info">Sửa</a>
                                <a href="{{route('xoa',$row->id)}}" class="btn btn-danger">Xóa</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection