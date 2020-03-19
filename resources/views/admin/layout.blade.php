<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>{{ config('blog.tile') }}后台管理</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    @yield('styles')
</head>
<body>
{{-- Navigation Bar --}}
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand mr-auto mr-lg-0" href="#">{{ config('blog.title') }} 后台</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-menu">
            @include('admin.partials.navbar')
        </div>
    </div>
</nav>
<main class="py-4">
    @yield('content')
</main>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>

<!-- bootstrap.bundle.min.js 用于弹窗、提示、下拉菜单，包含了 popper.min.js -->
<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>

<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>

@yield('scripts')
</body>
</html>