@extends('layouts.app')

@section('title')
    UETGram
@stop

@section('sidebar')
<nav class="side-navbar">
      @include('parts.sideHeader')
      <!-- Sidebar Navigation Menus-->
        <ul class="list-unstyled">
          <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
          <li><a href="{{route('album.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i>Thư mục gốc</a></li>
          <li><a href="#"><i class="fa fa-image" aria-hidden="true"></i>Tất cả ảnh</a></li>
        </ul>
    </nav>
@stop

@section('content')
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-5">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>UETGram</h1>
                  </div>
                  <p>Chia sẻ ảnh của bạn với mọi người!</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-7 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="login-form" class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Địa chỉ email</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không được để trống')">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: #F00">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mật khẩu</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không được để trống')">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color: #F00">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng nhập
                                </button>
                            </div>
                        </div>
                    </form><a href="{{ route('password.request') }}" class="forgot-pass">Quên mật khẩu?</a><br><small>Không có tài khoản? </small><a href="{{ route('register') }}" class="signup">Đăng ký</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
