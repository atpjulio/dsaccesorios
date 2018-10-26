@extends('layouts.frontend.template')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <div class="quienes-fondo-imagen d-flex align-items-center justify-content-center">
                <div class="productos-imagen-texto">
                    <h1>Trabaja con nosotros</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-none d-sm-none d-md-block">
                <h2>
                    Trabaja con nosotros
                </h2>
            </div>
            <div class="d-block d-sm-block d-md-none">
                <br>
                <h4>
                    Trabaja con nosotros
                </h4>                
            </div>

            <br>
            <h4>
                ¿ Quieres ser parte de DS Accesorios 365 ? <br><br>
                Agradecemos tu interés por formar parte de nuestra tienda. Organiza tu propio negocio a través de nuestros productos modernos e innovadores
                <br><br>
                Escríbenos a <a href="mailto:{{ config('constants.companyInfo.email') }}">{{ config('constants.companyInfo.email') }}</a>
            </h4>
        </div>
    </div>
    <br>    
</div>
@endsection