@extends('Admin/admin')
@section('main')
    <h2>Thương hiệu</h2>
     <a href="{{route('themban')}}"class="btn btn-primary" > Thêm</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Img</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ban as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td><img src="{{$row->img}}" alt="" width="200px" height="100px"></td>
                    <td>
                        <a href="{{route('xoaban',$row->id)}}" class="btn btn-danger">Xóa</a>
                        @method('delete')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection