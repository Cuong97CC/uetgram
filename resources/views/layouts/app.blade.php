<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-4.0.0-alpha.6/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.default.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" type="text/css">
</head>
@if(Auth::guest())
<body onContextMenu="return false">
@else
<body>
@endif
    <div class="page form-page">
        @include('parts.navbar')
        <div class="page-content d-flex align-items-stretch"> 
        @yield('sidebar')
            <div class="content-inner">
                    @if(Session::has('msg'))
                    <div id="msg" class="alert alert-{{ Session::get('type') }} alert-dismissable" style="text-align:center">
                        <strong>Notification: </strong>{{ Session::get('msg') }}
                    </div>
                    @endif
                @yield('header')
                @yield('content')
                @include('parts.footer')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ URL::asset('js/tether.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('libs/bootstrap-4.0.0-alpha.6/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/my.js') }}"></script>
</body>
</html>
