<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/insignia/logo.png">

    <title>@yield('titulo')</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="/dashboard/css/simplebar.css">
    <!-- Fonts CSS -->

    {{-- <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/dashboard/css/feather.css">
    <link rel="stylesheet" href="/dashboard/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/dashboard/css/style.css">
    <link rel="stylesheet" href="/dashboard/css/select2.css">
    <link rel="stylesheet" href="/dashboard/css/dropzone.css">
    <link rel="stylesheet" href="/dashboard/css/uppy.min.css">
    <link rel="stylesheet" href="/dashboard/css/jquery.steps.css">
    <link rel="stylesheet" href="/dashboard/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/dashboard/css/quill.snow.css">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/dashboard/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="/dashboard/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="/dashboard/css/app-dark.css" id="darkTheme" disabled>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@sweetalert2/theme-bootstrap-4/bootstrap-4.css"></script>
    <script src="{{ asset('/js/qrcode.js') }}"></script>
    <script src="{{ asset('/js/qrcode.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2.all.min.j')}}'"></script>
    {{-- <link rel="stylesheet" href="css/sweetalert.css"> --}}
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body class="vertical light">
    <div class="wrapper">
        <style>
            .modal-backdrop {
                /* bug fix - no overlay */
                display: none;
            }

            #loading {
                position: fixed;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                opacity: 0.7;
                background-color: #fff;
                z-index: 99;
            }

            #loading-image {
                z-index: 100;
            }

        </style>
        <div class="col-md-12 p-1 bg-light shadow-lg" style="border-bottom:5px solid rgba(255, 0, 0, 0.616);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('images/insignia/logo.svg') }}" width="25%" alt="">
                    </div>
                    <div class="col-md-7 p-4">
                        <div class="row align-items-middle">
                            <div class="col-md-2"><a href="/">Inicio</a></div>
                            <div class="col-md-2"><a href=""> Taxas</a></div>
                            @if (Auth::user() != null)



                                @if (isset(Auth::user()->vc_perfil))
                                    @if (Auth::user()->vc_perfil == 'Administrador' || Auth::user()->vc_perfil == 'Master')
                                        <div class="col-md-2"><a href="/dashboard/admin">Painel</a></div>
                                    @endif



                                @endif
                            @endif
                            <div class="col-md-2"><a href="#sobre">Sobre</a></div>

                            @if (isset(Auth::user()->vc_perfil))
                                @if (Auth::user()->vc_perfil == 'Cliente')

                                    <div class="col-md-2"><a href="/dashboard/admin">Perfil</a></div>

                                    <div class="col-md-2"> <a
                                            href="{{ route('cliente') }}">Estabelecimentos</a>
                                        </a></div>

                                    <div class="col-md-2"><a class="text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form-site').submit();">
                                            Sair
                                            <i class="fas fa-sign-out-alt"></i>
                                        </a></div>
                                @endif
                            @endif

                            @if (Auth::user() == null)

                                <div class="col-md-2"> <a href="{{ url('register') }}">Registar-se</a>
                                    </a></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form id="logout-form-site" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>

        <div class=" banner p-5 h-10" style="border-bottom:5px solid rgba(255, 0, 0, 0.616);">
            <div class="col-md-12 d-flex justify-content-end">
                @if (!Auth::user())
                    <div class="col-md-3 bg-light shadow-lg login py-4" data-aos="fade-up-left" style="">

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="my-5">
                                <h3 class="h3 text-center">Entrar</h3>
                            </div>
                            <div class="form-group my-3 pt-4">
                                <input type="text" placeholder="email" class="form-control input" name="email" id="">
                            </div>
                            <div class="form-group pt-4">
                                <input type="password" placeholder="Senha" class="form-control input" name="password"
                                    id="">
                            </div>
                            <div class="col-md-4 mt-5 mx-auto">
                                <button class="btn btn-lg btn-danger ">Entrar</button>
                            </div>
                        </form>

                    </div>
                @else


                @endif

            </div>


        </div>
