
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SGH - Iniciar sessão</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('dashboard/img/favicon.png')}}" rel="icon">
  <link href="{{asset('dashboard/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="{{asset('dashboard/img/logo.png')}}" alt="">
                <span class="d-none d-lg-block">SGH</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Inicie sessão em sua conta</h5>
                  <p class="text-center small">Insira seu email e palavra-passe para iniciar sessão</p>
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">

                        @csrf
                  <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="email" class="form-control" id="email" :value="old('email')" required autofocus>
                      <div class="invalid-feedback">Porfavor insira seu email</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="password" class="form-label">Palavra - passe</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    <div class="invalid-feedback">Porfavor insira sua palavra-passe</div>
                  </div>



                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember_me">
                      <label class="form-check-label" for="remember_me">Lembrar- me</label>
                    </div>
                  </div>

                  <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua palavra-passe?') }}
                        </a>
                    @endif
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Iniciar sessão</button>
                  </div>
                  {{-- <div class="col-12">
                    <p class="small mb-0">Não tem uma conta? <a href="{{ route("register") }}">Crie uma conta!</a></p>
                  </div> --}}
                </form>

              </div>
            </div>



          </div>
        </div>
      </div>

    </section>

  </div>
</main>
  <!-- Vendor JS Files -->
  <script src="{{asset('dashboard/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('dashboard/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('dashboard/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('dashboard/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('dashboard/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('dashboard/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('dashboard/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('dashboard/js/main.js')}}"></script>

</body>

</html>
