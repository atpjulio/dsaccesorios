@extends('layouts.frontend.template')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link tab-link @if(!$id) active @endif" id="todos-tab" data-toggle="tab" href="#todos" role="tab" aria-controls="todos" aria-selected="true">Todos</a>
            </li>
            @foreach ($categoriesToShow as $key => $categoryName)
            <li class="nav-item">
                <a class="nav-link tab-link @if($id == strtolower($categoryName)) active @endif" id="{{ strtolower($categoryName) }}-tab" data-toggle="tab" href="#{{ strtolower($categoryName) }}" role="tab" aria-controls="{{ strtolower($categoryName) }}" aria-selected="false">{{ $categoryName }}</a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade @if(!$id) show active @endif" id="todos" role="tabpanel" aria-labelledby="todos-tab">
                <br>
                @if(!$id)
                <div class="row justify-content-center">            
                    <div class="col-md-8 text-center">
                        @include('partials.messages_filled')
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-xl-4 col-md-6 text-center">
                        <div class="tienda-fondo-color d-flex align-items-center justify-content-center">
                            <div class="productos-color-texto">
                                <h1>Todas</h1>
                            </div>
                        </div>
                    </div>                    
                    @if(count($all) > 0)
                    @foreach($all as $one)
                        <div class="col-xl-4 col-md-6">
                        {!! Form::open(['route' => 'add.to.cart', 'method' => 'POST']) !!}
                            <img src="{{ Storage::url($one->picture) }}" class="w-100" style="height: 300px;">
                            <h4>{!! $one->name !!}</h4>
                            <h3>                                
                                $ {!! number_format($one->price, 0, ",", ".") !!}
                                <div class="float-right">
                                    <a href="{{ route('more', $one->id) }}" class="btn btn-secondary">
                                        <i class="fa fa-search"></i> 
                                        Ver más
                                    </a>
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fas fa-cart-plus"></i> 
                                        Añadir
                                    </button>
                                </div>
                            </h3>
                            <br>
                            {!! Form::hidden('product_id', $one->id) !!}
                            {!! Form::hidden('quantity', 1) !!}
                            {!! Form::hidden('category', '') !!}
                        {!! Form::close() !!}
                        </div>
                    @endforeach
                    @else
                        <div class="col-xl-4 col-md-6">
                            <h4>Estos artículos están siendo elaborados con mucho cariño...</h1>
                            <img src="{{ asset('img/logo.png') }}" class="w-75">
                        </div>
                    @endif
                </div>
            </div>
            @foreach ($categoriesToShow as $key => $categoryName)
            <div class="tab-pane fade @if($id == strtolower($categoryName)) show active @endif" id="{{ strtolower($categoryName) }}" role="tabpanel" aria-labelledby="{{ strtolower($categoryName) }}-tab">
                <br>
                @if($id == strtolower($categoryName))
                <div class="row justify-content-center">            
                    <div class="col-8 text-center">
                        @include('partials.messages_filled')
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-xl-4 col-md-6 text-center">
                        <div class="tienda-fondo-color d-flex align-items-center justify-content-center">
                            <div class="productos-color-texto">
                                <h1>{!! $categoryName !!}</h1>
                            </div>
                        </div>
                    </div>
                    @if (count($categoriesInfo[$key]) > 0)
                    @foreach($categoriesInfo[$key] as $one)
                        <div class="col-xl-4 col-md-6">
                        {!! Form::open(['route' => 'add.to.cart', 'method' => 'POST']) !!}
                            <img src="{{ Storage::url($one->picture) }}" class="w-100" style="height: 300px;">
                            <h4>{!! $one->name !!}</h4>
                            <h3>                                
                                $ {!! number_format($one->price, 0, ",", ".") !!}
                                <div class="float-right">
                                    <a href="{{ route('more', $one->id) }}" class="btn btn-secondary">
                                        <i class="fa fa-search"></i> 
                                        Ver más
                                    </a>
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fas fa-cart-plus"></i> 
                                        Añadir
                                    </button>
                                </div>
                            </h3>
                            <br>
                            {!! Form::hidden('product_id', $one->id) !!}
                            {!! Form::hidden('quantity', 1) !!}
                            {!! Form::hidden('category', strtolower($categoryName)) !!}
                        {!! Form::close() !!}
                        </div>
                    @endforeach
                    @else
                        <div class="col-xl-4 col-md-6 m-1">
                            <h4>Estos artículos están siendo elaborados con mucho cariño...</h1>
                            <img src="{{ asset('img/logo.png') }}" class="w-75">
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br>
@endsection