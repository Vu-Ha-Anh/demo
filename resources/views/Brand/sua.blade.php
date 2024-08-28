@extends('Admin/admin')
@section('main')
    <form action="{{route('luubrand',$th->id)}}" method="post">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Id:</label>
            <input type="text" class="form-control"  placeholder="Id" name="id" value="{{$th->id}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tên thương hiệu:</label>
            <input type="text" class="form-control"  placeholder="Nhập tên thương hiệu" name="name" value="{{$th->name}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Trạng thái:</label>
            <select name="status">
                <option value="">Chọn</option>
                <option value="0">Mới</option>
                <option value="1">Cũ</option>
        </select>
        </div>
        <button type="submit" class="btn btn-success"> Save</button>
        <a href="/brand/formbrand" class="btn btn-primary">Trở lại</a>
        @csrf
        @METHOD('PUT')
    </form>
@endsection