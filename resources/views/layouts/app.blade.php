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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <style>
            body {
                background-image: url('{{asset("assets/img/bg.jpg")}}');
                background-size: cover;
                background-position: 50%;
            }
            .maincont {
                background-color: rgba(0,0,0,0.7);
            }
        </style>
    </head>
    <body class="text-bg-dark">
        <div id="app">
            @include('layouts.navigation')
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

            $('.show-alert-delete-box').click(function(event){
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: "Siguran?",
                    text: "Jel si siguran da hoćes da izbrišes podatak?",
                    icon: "warning",
                    type: "warning",
                    buttons: ["Odustani","Da!"],
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Da, izbriši!'
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        </script>
    </body>
</html>
