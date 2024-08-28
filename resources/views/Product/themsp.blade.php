@extends('Admin/admin')
@section('main')
<div class="container mb-3">
    <form action="{{route('save')}}" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control"  placeholder="Nhập tên sản phẩm" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Giá sản phẩm:</label>
            <input type="text" class="form-control"  placeholder="Nhập giá sản phẩm" name="price">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Giá sale:</label>
            <input type="text" class="form-control" placeholder="Nhập giá sale" name="price_sale">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Mô tả sản phẩm:</label>
            <input type="text" class="form-control"  placeholder="Mô tả sản phẩm" name="content">
        </div>
        <div class="form-group">
            <label for="">Ảnh</label>
            <input type="file" name="img">
            @error('upload')

        </div>
      <div class="mb-3">
        <label for="">Thương hiệu</label>
        <select name="brand_id" >
            <option value="">Chọn nhóm</option>
            @foreach ($brand as $Cate )
            <option value="{{$Cate->id}}">{{$Cate->name}}</option>
            @endforeach
        </select>
        <label for="">Danh mục sản phẩm</label>
        <select name="category_id" >
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
      @method('post')
    </form>
    
</div>
@endsection