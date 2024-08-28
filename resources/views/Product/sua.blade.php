@extends('Admin/admin')
@section('main')
<div class="container mb-3">
    <form action="{{route('luu',$sp->id)}}" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control"  placeholder="Nhập tên sản phẩm" name="name" value="{{$sp->name}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Giá sản phẩm:</label>
            <input type="text" class="form-control"  placeholder="Nhập giá sản phẩm" name="price" value="{{$sp->price}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Giá sale:</label>
            <input type="text" class="form-control" placeholder="Nhập giá sale" name="price_sale" value="{{$sp->sale_price}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Mô tả sản phẩm:</label>
            <input type="text" class="form-control"  placeholder="Mô tả sản phẩm" name="content" value="{{$sp->content}}">
        </div>
        <div class="form-group">
            <label for="">Ảnh</label>
            <input type="file" name="img" value="{{$sp->img}}">
            @error('upload')
            <small>{{$message}}</small>
            @enderror
        </div>
      <div class="mb-3">
        <label for="">Thương hiệu</label>
        <select name="brand_id" value="{{$sp->brand_id}}" >
            <option value="">Chọn nhóm</option>
            @foreach ($brand as $Cate )
            <option value="{{$Cate->id}}">{{$Cate->name}}</option>
            @endforeach
        </select>
        <label for="">Danh mục sản phẩm</label>
        <select name="category_id" value="{{$sp->category_id}}">
            <option value="">Chọn nhóm</option>
            @foreach ($cate as $Cate )
            <option value="{{$Cate->id}}">{{$Cate->name}}</option>
            @endforeach
        </select>
        <label for="">Trạng thái</label>
        <select name="status">
            <option value="">Chọn</option>
            <option value="0">Sản phẩm mới</option>
            <option value="1">Sản phẩm cũ</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Save</button>
      <a href="/sanpham/form" class="btn btn-info" >Trở lại</a>
      @csrf
      @Method('put')
    </form>
    
</div>
@endsection