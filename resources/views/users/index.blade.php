@extends('layouts.backend.template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Listado de Usuarios Registrados </h3>
            <p class="title-description"> Aquí puedes ver el listado de todos los usuarios y crear, actualizar o eliminar cualquiera de ellos </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('users.create') }}" class="btn btn-pill-left btn-primary btn-lg">
                <i class="fa fa-plus"></i>
                Nuevo Usuario
            </a>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Usuarios registrados en el sistema </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover" id="myTable">
                                <thead>
                                <th class="">Nombre</th>    
                                <th style="">Email</th>
                                <th class="">Tipo de usuario</th>
                                <th style="width: 103px;">Opciones</th>
                                </thead>
                                <tbody>
                                @if(count($users) > 0)
                                @foreach($users as $user)
                                <tr>
                                    <td>{!! $user->full_name !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! config('constants.userRolesFrontEnd.'.$user->user_type) !!}</td>
                                    <td>
                                    @role('admin')
                                        @if ($user->id == auth()->user()->id)
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-oval btn-info btn-sm">
                                            Editar
                                        </a>
                                        @else
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-pill-left btn-info btn-sm">
                                            Editar
                                        </a>                                        
                                        <a href="javascript:showModal('user/delete/{{ $user->id }}')" class="btn btn-pill-right btn-danger btn-sm">
                                            Borrar
                                        </a>
                                        @endif
                                    @endrole                                            
                                    </td>
                                </tr>
                                @endforeach
                                @endif
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
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/general/index.js') }}"></script>
@endpush