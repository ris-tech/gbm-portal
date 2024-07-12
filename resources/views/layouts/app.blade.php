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
            .toggle-fullscreen-btn {
                position: fixed;
                z-index: 10000;
                top: 30px;
                left: 100px;
                border: 0;
                padding: 0;
                background: none;
                cursor: pointer;
                outline: none;
            }


            .toggle-fullscreen-svg {
                display: block;
                height: auto;
            }

            .toggle-fullscreen-svg path {
                transform-box: view-box;
                transform-origin: 12px 12px;
                fill: none;
                stroke: hsl(225, 10%, 8%);
                stroke-width: 4;
                transition: .15s;
            }


            .toggle-fullscreen-btn:hover path:nth-child(1),
            .toggle-fullscreen-btn:focus path:nth-child(1) {
                transform: translate(-2px, -2px);
            }

            .toggle-fullscreen-btn:hover path:nth-child(2),
            .toggle-fullscreen-btn:focus path:nth-child(2) {
                transform: translate(2px, -2px);
            }

            .toggle-fullscreen-btn:hover path:nth-child(3),
            .toggle-fullscreen-btn:focus path:nth-child(3) {
                transform: translate(2px, 2px);
            }

            .toggle-fullscreen-btn:hover path:nth-child(4),
            .toggle-fullscreen-btn:focus path:nth-child(4) {
                transform: translate(-2px, 2px);
            }


            .toggle-fullscreen-btn:not(.on) .icon-fullscreen-leave {
                display: none;
            }

            .toggle-fullscreen-btn.on .icon-fullscreen-enter {
                display: none;
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

            if(document.fullscreenEnabled || document.webkitFullscreenEnabled) {
                const toggleBtn = document.querySelector('.js-toggle-fullscreen-btn');

                const styleEl = document.createElement('link');
                styleEl.setAttribute('rel', 'stylesheet');
                styleEl.setAttribute('href', 'https://codepen.io/tiggr/pen/poJoLyW.css');
                styleEl.addEventListener('load', function() {
                    toggleBtn.hidden = false;
                });
                document.head.appendChild(styleEl);

                toggleBtn.addEventListener('click', function() {
                    if(document.fullscreen) {
                        document.exitFullscreen();
                    } else if(document.webkitFullscreenElement) {
                        document.webkitCancelFullScreen()
                    } else if(document.documentElement.requestFullscreen) {
                        document.documentElement.requestFullscreen();
                    } else {
                        document.documentElement.webkitRequestFullScreen();
                    }
                });

                document.addEventListener('fullscreenchange', handleFullscreen);
                document.addEventListener('webkitfullscreenchange', handleFullscreen);


                function handleFullscreen() {
                    if(document.fullscreen || document.webkitFullscreenElement) {
                        toggleBtn.classList.add('on');
                        toggleBtn.setAttribute('aria-label', 'Exit fullscreen mode');
                    } else {
                        toggleBtn.classList.remove('on');
                        toggleBtn.setAttribute('aria-label', 'Enter fullscreen mode');
                    }
                }
            }

        </script>
    </body>
</html>
