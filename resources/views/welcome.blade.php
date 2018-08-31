@extends('layouts.frontend.template')

@section('content')
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/foto.png') }}" style="max-height: 580px;">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="texto-slider">
                                        <h1>Nueva Colección</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/products/cartera1.jpg') }}" style="max-height: 580px;">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/foto.png') }}" style="max-height: 580px;">
                </div>
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
    </div>
    <br>
    <div class="text-center">
        <h1>Productos</h1>
    </div>
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="productos-fondo-imagen">
                <a href="/store/lazos">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="text-center">
                                <div class="productos-imagen-texto">
                                    <h1>Lazos</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="productos-fondo-color">
                <a href="/store/vinchas">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="text-center">
                                <div class="productos-color-texto">
                                    <h1>Vinchas</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="productos-fondo-imagen">
                <a href="/store/cintillos">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="text-center">
                                <div class="productos-imagen-texto">
                                    <h1>Cintillos</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="productos-fondo-color">
                <a href="/store/carteras">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="text-center">
                                <div class="productos-color-texto">
                                    <h1>Carteras</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="productos-fondo-imagen">
                <a href="/store/sandalias">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="text-center">
                                <div class="productos-imagen-texto">
                                    <h1>Sandalias</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="productos-fondo-color">
                <a href="/store/colecciones">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="text-center">
                                <div class="productos-color-texto">
                                    <h1>Colecciones</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <br>
    <hr class="custom-hr">
    <div class="row">
        <div class="col-xs-12 col-md-4">
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