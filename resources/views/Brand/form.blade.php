@extends('Admin/admin')
@section('main')
    <h2>Thương hiệu</h2>
    <a href="{{route('thembrand')}}" class="btn btn-primary">Thêm </a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($th as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->status}}</td>
                    <td>
                        <a href="{{route('suabrand',$row->id)}}" class="btn btn-info">Sửa</a>
                        <a href="{{route('xoabrand',$row->id)}}" class="btn btn-danger">Xóa</a>
                        @method('delete')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection