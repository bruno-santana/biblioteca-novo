@extends('admin.master.master')

@section('title', 'Novo Usuário')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> Usuários</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('users.create')}}"><i class="fa fa-user" aria-hidden="true"></i> Novo Usuário</a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    @include('admin.includes.alerts')
    <div class="page_user">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="panel shadow">
                        <div class="header">
                            <h3 class="title">
                                <i class="fas fa-camera" aria-hidden="true"></i> Imagem
                            </h3>
                        </div>

                        <div class="inside">
                            <div class="mini_profile">
                            
                            </div>
                            <div class="custom-file mtop16">
                                <label class="custom-file-label" for="avatar">Escolher Imagem</label>
                                <input type="file" class="custom-file-input" name="avatar" id="avatar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel shadow">
                        <div class="header">
                            <h3 class="title">
                                <i class="fas fa-address-card" aria-hidden="true"></i> Informações
                            </h3>
                        </div>

                        <div class="inside">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="name">Nome:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <input type="text" name="name" class="form-control" placeholder="Nome do usuário">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="name">Matrícula:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <input type="text" name="registration" class="form-control" placeholder="Matrícula">
                                    </div>
                                </div>

                                <div class="col-md-8 mtop16">
                                    <label for="name">Email:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-4 mtop16">
                                    <label for="name">Criar a senha:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fa fa-fingerprint" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <input type="password" name="password" class="form-control" placeholder="Senha">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Cadastar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection