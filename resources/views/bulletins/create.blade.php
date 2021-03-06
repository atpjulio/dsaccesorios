@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Nuevo Boletín </h3>
            <p class="title-description"> Añadiendo nuevo boletín al sistema </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('bulletin.index') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="far fa-newspaper"></i>
                Listado
            </a>
        </div>
    </div>
    {!! Form::open(['route' => 'bulletin.store', 'method' => 'POST']) !!}
    <section class="section">
        <div class="row justify-content-center">
            @include('bulletins.fields')
            <div class="col-md-12 text-center">
                {!! Form::submit('Guardar solamente', ['class' => 'btn btn-oval btn-info', 'name' => 'saveOnly']) !!}
                &nbsp;
                {!! Form::submit('Guardar y enviar', ['class' => 'btn btn-oval btn-primary']) !!}
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@endsection

@push('scripts')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endpush