<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! config('constants.companyInfo.name') !!}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300i,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/regular.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?version={{ config('constants.stylesVersion') }}">

    <link rel="icon" href="{{ asset('img/favicon.png') }}">    
    @stack('styles')
    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            /* Margin bottom by footer height */
            margin-bottom: 60px;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            line-height: 60px; /* Vertically center the text there */
            background-color: #f5f5f5;
        }
    </style>
    <!-- Open Graph data -->
    <meta property="og:title" content="{{ config('constants.companyInfo.name') }}" />
    <meta property="og:description" content="{{ config('constants.companyInfo.description') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ config('constants.companyInfo.name') }}" />
</head>
<body>
<header>
    @include('layouts.frontend.header')
</header>

<!-- Begin page content -->
<main role="main" class="container-fluid">
    @if(!Request::is('store*'))
        <div class="container text-center">            
            @include('partials.messages_filled')
        </div>
    @endif
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        @include('layouts.frontend.footer')
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header table-success">
                <h5 class="modal-title" id="exampleModalLabel">Suscribirse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => 'subscribe', 'method' => 'POST']) !!}
            <div class="modal-body">
                <p>Al suscribirte recibirás periódicamente un correo con las nuevas colecciones, productos en oferta y cupones de descuento que podrás aprovechar</p>
                <p>Solo tienes que colocar tu correo electrónico y hacer clic en <strong>Suscribirse</strong></p>
                {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Tu email']) !!}
                <p><br>Gracias por confiar en nosotros!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-secondary">Suscribirse</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>
<script src="{{ asset('js/brands.js') }}"></script>
<script src="{{ asset('js/solid.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
@stack('scripts')

</body>
</html>
