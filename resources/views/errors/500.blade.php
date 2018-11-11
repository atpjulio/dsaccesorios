@extends('layouts.frontend.template')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Error en el sistema!
                    </h5>
                </div>

                <div class="card-body">
                    <strong>            
                        Uy, lo sentimos ha ocurrido un error en el sistema
                    </strong>
                    <br><br>
                    Se ha enviado automáticamente un correo a soporte
                    <br><br>
                    Disculpas por las molestias causadas,<br>
                    Haz clic <a href="{{ route('login') }}">aquí</a> para ir al inicio
                    <br><br>
                    El equipo IT de {!! config('constants.companyInfo.longName') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
