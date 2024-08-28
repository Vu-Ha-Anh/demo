@extends('Admin/admin')
@section('main')
    <form action="{{route('saveban')}}" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tên:</label>
            <input type="text" class="form-control"  placeholder="Nhập tên " name="name">
        </div>
        <div class="form-group">
            <label for="">Ảnh</label>
            <input type="file" name="img">
            @error('upload')
                <small class="help-block text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"> Save</button>
        <a href="/banner/formbanner" class="btn btn-primary">Trở lại</a>
        @csrf
    </form>
@endsection