@extends('layouts.frontend.template')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link tab-link @if(!$id) active @endif" id="todos-tab" data-toggle="tab" href="#todos" role="tab" aria-controls="todos" aria-selected="true">Todos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tab-link @if($id == 'lazos') active @endif" id="lazos-tab" data-toggle="tab" href="#lazos" role="tab" aria-controls="lazos" aria-selected="false">Lazos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tab-link @if($id == 'vinchas') active @endif" id="vinchas-tab" data-toggle="tab" href="#vinchas" role="tab" aria-controls="vinchas" aria-selected="false">Vinchas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tab-link @if($id == 'cintillos') active @endif" id="cintillos-tab" data-toggle="tab" href="#cintillos" role="tab" aria-controls="cintillos" aria-selected="false">Cintillos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tab-link @if($id == 'carteras') active @endif" id="carteras-tab" data-toggle="tab" href="#carteras" role="tab" aria-controls="carteras" aria-selected="false">Carteras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tab-link @if($id == 'sandalias') active @endif" id="sandalias-tab" data-toggle="tab" href="#sandalias" role="tab" aria-controls="sandalias" aria-selected="false">Sandalias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tab-link @if($id == 'colecciones') active @endif" id="colecciones-tab" data-toggle="tab" href="#colecciones" role="tab" aria-controls="colecciones" aria-selected="false">Colecciones</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade @if(!$id) show active @endif" id="todos" role="tabpanel" aria-labelledby="todos-tab">
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="tienda-fondo-color">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8 text-center" style="margin-top: 40%;">
                                    <h1>Todas</h1>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    @for($i = 0; $i < 8; $i++)
                        <div class="col-sm-4">
                            <img src="{{ asset('img/products/lazo1.jpg') }}" class="w-100" style="height: 300px;">
                            <h4>Lazo negro con puntas rosas</h4>
                            <h3>
                                <img src="{{ asset('img/iconocompra.png') }}" height="20">
                                $ {!! number_format(10000, 0) !!}
                                <div class="float-right">
                                    <a href="/store/1/more" class="btn btn-secondary"><i class="fa fa-search"></i> Ver más</a>
                                    <a href="#" class="btn btn-secondary"><i class="fas fa-cart-plus"></i> Añadir</a>
                                </div>
                            </h3>
                            <br>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="tab-pane fade @if($id == 'lazos') show active @endif" id="lazos" role="tabpanel" aria-labelledby="lazos-tab">
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="tienda-fondo-color">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8 text-center" style="margin-top: 40%;">
                                    <h1>Lazos</h1>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    @for($i = 0; $i < 8; $i++)
                        <div class="col-sm-4">
                            <img src="{{ asset('img/products/lazo1.jpg') }}" class="w-100" style="height: 300px;">
                            <h4>Lazo negro con puntas rosas</h4>
                            <h3>
                                <img src="{{ asset('img/iconocompra.png') }}" height="20">
                                $ {!! number_format(10000, 0) !!}
                                <div class="float-right">
                                    <a href="#" class="btn btn-secondary"><i class="fa fa-search"></i> Ver más</a>
                                    <a href="#" class="btn btn-secondary"><i class="fas fa-cart-plus"></i> Añadir</a>
                                </div>
                            </h3>
                            <br>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="tab-pane fade @if($id == 'vinchas') show active @endif" id="vinchas" role="tabpanel" aria-labelledby="vinchas-tab">
                                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="tienda-fondo-color">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8 text-center" style="margin-top: 40%;">
                                    <h1>Vinchas</h1>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    @for($i = 0; $i < 8; $i++)
                        <div class="col-sm-4">
                            <img src="{{ asset('img/products/lazo1.jpg') }}" class="w-100" style="height: 300px;">
                            <h4>Lazo negro con puntas rosas</h4>
                            <h3>
                                <img src="{{ asset('img/iconocompra.png') }}" height="20">
                                $ {!! number_format(10000, 0) !!}
                                <div class="float-right">
                                    <a href="#" class="btn btn-secondary"><i class="fa fa-search"></i> Ver más</a>
                                    <a href="#" class="btn btn-secondary"><i class="fas fa-cart-plus"></i> Añadir</a>
                                </div>
                            </h3>
                            <br>
                        </div>
                    @endfor
                </div>

            </div>
            <div class="tab-pane fade @if($id == 'cintillos') show active @endif" id="cintillos" role="tabpanel" aria-labelledby="cintillos-tab">
                                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="tienda-fondo-color">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8 text-center" style="margin-top: 40%;">
                                    <h1>Cintillos</h1>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    @for($i = 0; $i < 8; $i++)
                        <div class="col-sm-4">
                            <img src="{{ asset('img/products/lazo1.jpg') }}" class="w-100" style="height: 300px;">
                            <h4>Lazo negro con puntas rosas</h4>
                            <h3>
                                <img src="{{ asset('img/iconocompra.png') }}" height="20">
                                $ {!! number_format(10000, 0) !!}
                                <div class="float-right">
                                    <a href="#" class="btn btn-secondary"><i class="fa fa-search"></i> Ver más</a>
                                    <a href="#" class="btn btn-secondary"><i class="fas fa-cart-plus"></i> Añadir</a>
                                </div>
                            </h3>
                            <br>
                        </div>
                    @endfor
                </div>

            </div>
            <div class="tab-pane fade @if($id == 'carteras') show active @endif" id="carteras" role="tabpanel" aria-labelledby="carteras-tab">
                                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="tienda-fondo-color">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8 text-center" style="margin-top: 40%;">
                                    <h1>Carteras</h1>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    @for($i = 0; $i < 8; $i++)
                        <div class="col-sm-4">
                            <img src="{{ asset('img/products/lazo1.jpg') }}" class="w-100" style="height: 300px;">
                            <h4>Lazo negro con puntas rosas</h4>
                            <h3>
                                <img src="{{ asset('img/iconocompra.png') }}" height="20">
                                $ {!! number_format(10000, 0) !!}
                                <div class="float-right">
                                    <a href="#" class="btn btn-secondary"><i class="fa fa-search"></i> Ver más</a>
                                    <a href="#" class="btn btn-secondary"><i class="fas fa-cart-plus"></i> Añadir</a>
                                </div>
                            </h3>
                            <br>
                        </div>
                    @endfor
                </div>

            </div>
            <div class="tab-pane fade @if($id == 'sandalias') show active @endif" id="sandalias" role="tabpanel" aria-labelledby="sandalias-tab">
                                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="tienda-fondo-color">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8 text-center" style="margin-top: 40%;">
                                    <h1>Sandalias</h1>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    @for($i = 0; $i < 8; $i++)
                        <div class="col-sm-4">
                            <img src="{{ asset('img/products/lazo1.jpg') }}" class="w-100" style="height: 300px;">
                            <h4>Lazo negro con puntas rosas</h4>
                            <h3>
                                <img src="{{ asset('img/iconocompra.png') }}" height="20">
                                $ {!! number_format(10000, 0) !!}
                                <div class="float-right">
                                    <a href="#" class="btn btn-secondary"><i class="fa fa-search"></i> Ver más</a>
                                    <a href="#" class="btn btn-secondary"><i class="fas fa-cart-plus"></i> Añadir</a>
                                </div>
                            </h3>
                            <br>
                        </div>
                    @endfor
                </div>

            </div>
            <div class="tab-pane fade  @if($id == 'colecciones') show active @endif" id="colecciones" role="tabpanel" aria-labelledby="colecciones-tab">
                                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="tienda-fondo-color">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8 text-center" style="margin-top: 40%;">
                                    <h1>Coleciones</h1>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    @for($i = 0; $i < 8; $i++)
                        <div class="col-sm-4">
                            <img src="{{ asset('img/products/lazo1.jpg') }}" class="w-100" style="height: 300px;">
                            <h4>Lazo negro con puntas rosas</h4>
                            <h3>
                                <img src="{{ asset('img/iconocompra.png') }}" height="20">
                                $ {!! number_format(10000, 0) !!}
                                <div class="float-right">
                                    <a href="#" class="btn btn-secondary"><i class="fa fa-search"></i> Ver más</a>
                                    <a href="#" class="btn btn-secondary"><i class="fas fa-cart-plus"></i> Añadir</a>
                                </div>
                            </h3>
                            <br>
                        </div>
                    @endfor
                </div>

            </div>
        </div>
    </div>
    <br>
@endsection