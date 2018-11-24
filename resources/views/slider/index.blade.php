@extends('layouts.backend.template')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            display: none;
        }
        .operations {
            font-size: 20px;
        }
    </style>
@endpush

@section('content')
<div class="title-block">
    <div class="float-left">
        <h3 class="title"> Imágenes del Slider </h3>
        <p class="title-description"> Aquí puedes mostrar / ocultar / borrar las imágenes del slider </p>
    </div>
    <div class="float-right animated fadeInRight">
        <a href="{{ route('slider.create') }}" class="btn btn-pill-left btn-primary btn-lg">
            <i class="fa fa-plus"></i>
            Nueva Imagen
        </a>
    </div>

</div>

<section class="section">
    <div class="row align-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <div class="float-left">
                            <h3 class="title"> Imágenes guardadas en el sistema </h3>
                        </div>
                        <div class="float-right" id="change-order" style="display: none;">
                            {!! Form::open(['route' => 'slider.change.order', 'method' => 'POST', 'id' => 'order-form']) !!}
                                <button type="submit" class="btn btn-oval btn-secondary">
                                    <i class="fa fa-pen"></i>
                                    Cambiar orden
                                </button>
                                {!! Form::hidden('order', '', ['id' => 'order']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                             <thead>
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Texto que aparece con la imagen</th>
                                    <th scope="col">Orden de aparición</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($sliderImages as $sliderImage)
                                <tr>
                                    <td class="text-center">
                                        <a href="javascript:showModal('slider/{{ $sliderImage->id }}')">
                                            <img src="{{ $sliderImage->url }}" alt="" class="rounded" width="100">
                                        </a>
                                    </td>
                                    <td>{{ $sliderImage->text ?: '<< Sin texto >>' }}</td>
                                    <td>
                                        {!! Form::number('position[]', $sliderImage->position, [
                                            'class' => 'form-control position', 
                                            'id' => 'position'.$counter,
                                            'min' => 1,
                                            'max' => count($sliderImages),
                                            'style' => 'display: inline; width: 40px; background-color: #ccc;',
                                            'readonly'
                                        ]) !!}
                                        <a href="javascript:incrementPosition({{ $counter }})" class="text-info operations"><i class="fa fa-plus-circle"></i></a>
                                        &nbsp;
                                        <a href="javascript:decrementPosition({{ $counter }})" class="text-danger operations">
                                            <i class="fas fa-minus-circle"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#text-modal-{{ $sliderImage->id }}" class="btn btn-pill-left btn-info btn-sm">
                                            Texto
                                        </a>
                                        @if ($sliderImage->status == config('constants.status.active'))
                                        <a href="" data-toggle="modal" data-target="#status-modal-{{ $sliderImage->id }}" class="btn btn-warning btn-sm">
                                            Ocultar
                                        </a>
                                        @else
                                        <a href="" data-toggle="modal" data-target="#status-modal-{{ $sliderImage->id }}" class="btn btn-secondary btn-sm">
                                            Mostrar
                                        </a>
                                        @endif
                                        <a href="" data-toggle="modal" data-target="#confirm-modal-{{ $sliderImage->id }}" class="btn btn-pill-right btn-danger btn-sm">
                                            Borrar
                                        </a>
                                        
                                    </td>
                                    @php
                                        $counter++;
                                    @endphp                                    
                                    @include('slider.text_modal')
                                    @include('slider.status_modal')
                                    @include('slider.delete_modal')
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script type="text/javascript">
        var valuesArray = [];
        var show = false;
        $(document).ready(function() {
            if (valuesArray.length == 0) {
                $(".position").each(function(index, value) {                    
                    valuesArray.push(value.value);
                });
            }
        });

        function incrementPosition(currentId) {
            var currentValue = parseInt($('#position' + currentId).val());
            if (currentValue >= valuesArray.length) {
                return;
            }
            if (!show) {
                $('#change-order').css({'display': 'block'});
                $('#order-form').addClass('animated fadeInRight');
                show = true;
            }

            $('#position' + currentId).val(++currentValue);
            $(".position").each(function(index, element) {
                var value = parseInt($('#position' + index).val());
                if (index !== currentId && value === currentValue) {
                    $('#position' + index).val(currentValue - 1);
                    valuesArray[index] = currentValue - 1;
                }
            });
            valuesArray[currentId] = currentValue;
            $('#order').val(valuesArray);
        }

        function decrementPosition(currentId) {
            var currentValue = parseInt($('#position' + currentId).val());
            if (currentValue <= 1) {
                return;
            }
            if (!show) {
                $('#change-order').css({'display': 'block'});
                $('#order-form').addClass('animated fadeInRight');
                show = true;
            }

            $('#position' + currentId).val(--currentValue);
            $(".position").each(function(index, element) {
                var value = parseInt($('#position' + index).val());
                if (index !== currentId &&  value === currentValue) {
                    $('#position' + index).val(currentValue + 1);
                    valuesArray[index] = currentValue + 1;
                }
            });
            valuesArray[currentId] = currentValue;
            $('#order').val(valuesArray);
        }
    </script>    
@endpush