<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title', 'LaraBBS') - Laravel 进阶教程</title>
    <meta name="description" content="@yield('description', 'LaraBBS 爱好者社区')" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
<div id="app" class="{{ route_class() }}-page">
<!--自定义辅助方法：route_class()  -->
    @include('layouts._header')

    <div class="container">
      <!-- 导航区加入子模板 -->
        @include('layouts._message')
        @yield('content')
        <!--允许继承该模板，并注入内容  -->
    </div>

    @include('layouts._footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
