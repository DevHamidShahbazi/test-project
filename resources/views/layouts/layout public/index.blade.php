<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Test Project</title>
        <meta name="description" content="description">
        <meta name="keywords" content="keywords">
        <link href="./admin/css/font.min.css" rel="stylesheet">
        <link href="./admin/css/adminlte.min.css" rel="stylesheet">
        <link href="./admin/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="./admin/css/custom-style.css" rel="stylesheet">
    </head>
    <body >
    @include('components.toastr-alert.error')
    @include('components.toastr-alert.success')
    @include('components.errors.index')
    @yield('content')
    <script type="text/javascript" src="./admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="./admin/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./admin/js/toastr.js"></script>
    @yield('script')
    </body>
</html>
