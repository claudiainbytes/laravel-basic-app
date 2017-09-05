<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prueba Laravel - Usuarios </title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/js/jquery-ui/themes/base/jquery-ui.min.css') }}" />
    </head>
    <body>
        <!-- Top Bar -->
        @include("layouts.topBar")
        <!-- Top Bar -->
        <div class="container-fluid">
            <div class="row">
                <!-- Left NavBar -->
                @include("layouts.leftBar")
                <!-- Left NavBar -->
                <!-- Container Right -->
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    @yield("content")
                </div> <!-- Container Right -->
            </div> <!-- Container Row -->
        </div> <!-- Container fluid -->
        <script src="{{ asset('assets/js/jquery-1.12.4.min.js?') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    </body>
</html>
