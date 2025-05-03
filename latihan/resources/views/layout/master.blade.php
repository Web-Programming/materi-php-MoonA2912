<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <!-- Ini bagian Header-->
     @include('layout.header')

     <!-- Ini Bgian Sidebar -->
      @include('layout.sidebar')

     <!-- Ini Bagian Content -->
      @yield('content')

    <!-- Ini Bagian Footer -->
     @include('layout.Footer')
</body>
</html>