@extends('admin.master.master')

@section('title', 'Usuários')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> Usuários</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h3 class="title"><i class="fa fa-users" aria-hidden="true"></i> Usuários</h3>
            </div>
        </div>

        <div class="inside">
            <div class="mtop16">
                @include('admin.includes.alerts')
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="btns" style="margin-left: 16px">
                        <a href="{{ route('users.create')}}" class="btn btn-primary">
                             <i class="fa fa-plus"></i> Novo
                         </a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="col-md-12">
                        {!! Form::open(['route' => 'users.search']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            {!! Form::text('filter', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome ou o email', 'required']) !!}
                            <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-4">Nome</th>
                                    <th scope="col" class="col-4">Email</th>
                                    <th scope="col" class="col-4">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td scope="row" class="col-4">{{ strtoupper($user->name) }}</td>
                                    <td class="col-4">{{ strtoupper($user->email) }}</td>
                                    <td class="col-4">
                                        <div class="opts">
                                            <a href="{{ route('users.show', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Informações do usuário">
                                                <i class="fas fa-user"></i>
                                            </a>
    
                                            <a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                        
                                            
                                            <a href="{{ route('users.destroy', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                                                <i class="fa fa-trash-alt" aria-hidden="true"></i>]
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection