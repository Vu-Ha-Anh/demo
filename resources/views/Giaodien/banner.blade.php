@extends('Giaodien/trangchu')
@section('main')
<div class="container-fluid">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($ban as $row)
                <div class="carousel-item active">
                    <img src="{{$row->img}}" alt="" class="d-block" style="width:100%; height: 500px;">
                    <div class="carousel-caption">
                    </div>
                </div>
                @endforeach
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</div>
@endsection