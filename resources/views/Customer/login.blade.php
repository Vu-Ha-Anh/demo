@extends('Giaodien/trangchu')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="POST" action="{{ route('post_logon') }}">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Đăng nhập</button>
    @csrf
  </form>
        </div>
    </div>
</div>
@endsection
