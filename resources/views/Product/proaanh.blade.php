<div class="container">
    <h3>Thêm ảnh sản phẩm</h3>
    <h4>{{$name}}</h4>
    <table class="table">
    <thead>
      <tr>
        <th>Hình ảnh</th>
        <th></th>
        
      </tr>
    </thead>
    <tbody>
        @foreach ($proImg as $row )
        <tr>
            <td><img src="{{$row->img}}" alt=""></td>
            <td>
                <form action="{{route('xoaanh',$row->id)}}" method="">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <form action="{{route('luuanhsanpham')}}" method="">
    <input type="hidden" value="{{$id}}" name="id">
    <div class="mb-3 mt-3">
            <label for="email" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control"name="img">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="/sanpham/form" class="btn btn-info" >Trở lại</a>
      @csrf
  </form>
</div>