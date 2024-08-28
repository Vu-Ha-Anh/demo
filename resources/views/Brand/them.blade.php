@extends('Admin/admin')
@section('main')
    <form action="{{route('savebrand')}}" method="">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tên thương hiệu:</label>
            <input type="text" class="form-control"  placeholder="Nhập tên thương hiệu" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Trạng thái:</label>
            <select name="status">
                <option value="">Chọn</option>
                <option value="0">Mới </option>
                <option value="1">Cũ</option>
        </select>
        </div>
        <button type="submit" class="btn btn-success"> Save</button>
        <a href="/brand/formbrand" class="btn btn-primary">Trở lại</a>
        @csrf
       
    </form>
@endsection