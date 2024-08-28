<!DOCTYPE html>
<html lang="en">
<head>
  <title>Giao diện</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="/css/trangchu.css">
</head>
<body>


<div class="container-fluid">
<div class="row row1">
     <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 anhbia">
    
        <img src="" alt="">
        <span class="brand-text font-weight-light">AHA SHOP</span>
        
     </div>
     <div class="col-xs-4 col-sm-4 col-md-4 col-lg-5">
      <h4>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('sanpham')}}">Sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Liên hệ</a>
          </li>    
        </ul>
      </h4>
     </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <form class="d-flex timkiem" action="{{route('timkiem','key')}}" method="get">
              <div class="container-input">
                
                <input type="text" name="timkiem" placeholder="Tìm kiếm" style="margin-top: 10px; border-radius: 50px;">
                <svg="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                  <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z"
                    fill-rule="evenodd"></path>
                </svg>
                  
                <span>
                    <i class="fas fa-search icontk" ></i>
                    <a href="{{route('view.cart')}}"><i class="fas fa-cart-plus icongh" ></i></a>
                  </span>
              </div>
            </form>
              
              
             
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('customer.logon')}}">Đăng nhập</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('customer.register')}}">Đăng ký</a>
                  </li>
                </ul>
            </div>
        </div>
      </div>
  </div>
<div class="container-fluid main1">
 @yield('main')
</div>
<footer>
    <div class="container-fluid">
      <div class="row row1">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-5">
        <h4>Lienhe@web.com</h4>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-7">
        <div class="row" >
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h5>Tin tức</h5>
                <p>Khuyến mãi</p>
                <p>Tuyển dụng</p>
                <p>Chăm sóc khách hàng</p>
                <p>Giới thiệu sản phẩm</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h5>Sản phẩm mới</h5>
                <p>Gấu bông nhỏ xinh</p>
                <p>Móc khóa cute</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h5>Chính sách </h5>
                <p>Bảo mật</p>
                <p>Chính hãng</p>
            </div>
            
        </div>
    </div>
      </div>
    </div>
</footer>
</div>
</body>
</html>
