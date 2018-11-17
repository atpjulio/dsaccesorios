@extends('layouts.frontend.template')

@section('content')
<div class="container">
     <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <div class="quienes-fondo-imagen d-flex align-items-center justify-content-center">
                <div class="productos-imagen-texto">
                    <h1>Contáctanos</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-none d-sm-none d-md-block">
                <h2>
                    Encuéntranos en las redes sociales, es la mejor manera de que conozcas nuestro trabajo
                </h2>
            </div>
            <div class="d-block d-sm-block d-md-none">
                <br>
                <h4>
                    Encuéntranos en las redes sociales, es la mejor manera de que conozcas nuestro trabajo
                </h4>                
            </div>
            
            <br>
            <h4>
                Escríbenos a <a href="mailto:{{ config('constants.companyInfo.email') }}">{{ config('constants.companyInfo.email') }}</a>
            </h4>
            <h4>
                Síguenos en Instagram <a href="{{ config('constants.companyInfo.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>

            </h4>
            <h4>
                Visítanos en Facebook <a href="{{ config('constants.companyInfo.facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </h4>
            <h4>
                Contáctanos por WhatsApp <a href="{{ config('constants.companyInfo.whatsapp') }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
            </h4>
        </div>
    </div>
    <br>
    
</div>
@endsection