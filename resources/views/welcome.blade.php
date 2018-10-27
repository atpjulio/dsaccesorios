@extends('layouts.frontend.template')

@section('content')
    <div class="container">
        @if (count($sliderImages) > 0)
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            @foreach ($sliderImages as $key => $val)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" 
                    @if ($key == 0) class="active" @endif></li>
            @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($sliderImages as $key => $sliderImage)
                <div class="carousel-item @if ($key == 0) active @endif">
                    <img class="d-block w-75" src="{{ asset($sliderImage->url) }}" style="max-height: 580px;">
                    @if ($sliderImage->text)
                    <div class="carousel-caption d-none d-md-block">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="texto-slider">
                                        <h1>{!! $sliderImage->text !!}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @endif
    </div>
    <br>
    <div class="text-center">
        <h1>Productos</h1>
    </div>
    <div class="row">
        @foreach ($categoriesToShow as $id => $category)
        <div class="col-md-4 text-center">
            @if ($id % 2 == 0)
            <div class="productos-fondo-color d-flex align-items-center justify-content-center">
            @else
            <div class="productos-fondo-imagen d-flex align-items-center justify-content-center">
            @endif
                <a href="/store/{{ strtolower($category) }}">
                    @if ($id % 2 == 0)
                        <div class="productos-color-texto">
                    @else
                        <div class="productos-imagen-texto">
                    @endif
                        <h1>{!! $category !!}</h1>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <hr class="custom-hr">
    <div class="row justify-content-center">
        <div class="col-7 col-md-4 text-center">
            <img src="{{ asset('img/accesorios_hechos.png') }}" class="img-fluid">
        </div>
        <div class="col-6 col-md-4">
            <img src="{{ asset('img/50mano.png') }}" class="img-fluid">
        </div>
        <div class="col-6 col-md-4">
            <img src="{{ asset('img/50 amor.png') }}" class="img-fluid">
        </div>
    </div>
@endsection