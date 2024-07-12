<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <script src="{{asset('assets/js/jquery.min.js')}}"></script>

        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>


        <link href="{{asset('assets/css/bootstrap-icons/font/bootstrap-icons.min.css')}}" rel="stylesheet">
        <style>
            body {
                background-image: url('{{asset("assets/img/bg.jpg")}}');
                background-size: cover;
                background-position: 50%;
            }
            .maincont {
                background-color: rgba(0,0,0,0.7);
            }
            #cardId{
                background: transparent;
            }
        </style>
    </head>
    <body class="d-flex align-items-center justify-content-center vh-100 bg-dark">
        <div class="mx-auto text-center shadow-sm" id="app">
            <main class="py-4">
                <div class="container p-4 maincont">
                    @yield('content')
                </div>
            </main>
        </div>
        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
            setTimeout(() => {
                $('.alert-success').fadeOut();
            }, 3000);

            $( document ).ready(function() {
                $('#cardId').focus();
            });
        </script>
    </body>
</html>
