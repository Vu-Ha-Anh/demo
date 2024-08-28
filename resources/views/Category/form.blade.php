@extends('Admin/admin')
@section('main')
    <h2>Danh sách sản phẩm</h2>
    <a href="{{route('themcate')}}" class="btn btn-primary">Thêm </a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cate as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->status}}</td>
                    <td>
                        <a href="{{route('suacate',$row->id)}}" class="btn btn-info">Sửa</a>
                        <a href="{{route('xoacate',$row->id)}}" class="btn btn-danger">Xóa</a>
                        @method('delete')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection