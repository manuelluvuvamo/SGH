@include('layouts._includes.Header')
@include('layouts._includes.Menu')
{{-- @include('alerts.alert')--}}

<main id="main" class="main">

                @yield('conteudo')
                
</main><!-- End #main -->

@include('layouts._includes.Footer')
