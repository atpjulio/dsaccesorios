@extends('layouts.frontend.template')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Error en la página!
                    </h5>
                </div>

                <div class="card-body">
                    <strong>            
                        La página ha dejado de funcionar debido a inactividad
                    </strong>
                    <br><br>
                    Por favor, ve hacia atrás actualiza la página e inténtalo nuevamente
                    <br><br>
                    Disculpas por las molestias causadas,<br>
                    El equipo IT de {!! config('constants.companyInfo.longName') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
