<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Gửi liên hệ</h2>
  <form action="{{route('guilienhe')}}" method="post">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email">
      @error('name') {{$message}} @enderror
    </div>
    <div class="mb-3">
      <label for="">Họ tên:</label>
      <input type="text" class="form-control" placeholder="Enter name" name="name">
    </div>
    @error('email') {{$message}} @enderror

    <div class="mb-3">
      <label for="pwd">Nội dung:</label>
      <textarea name="message" class="form-control"></textarea>
    </div>
    @error('message') {{$message}} @enderror
    <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
    @csrf
  </form>
</div>


</body>
</html>
