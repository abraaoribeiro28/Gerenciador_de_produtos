<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    
</head>
<body>
    <div class="bg-gray-100 h-screen w-full flex">
            @include('admin.layout.sidebar')
            @yield('content')
    </div>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="/js/script.js"></script>
    <script src="{{url('js/app.js')}}"></script>
</body>
</html>
