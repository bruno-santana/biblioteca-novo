@extends('admin.master.master')

@section('title', 'Novo Irmão')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('studants.index')}}"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Irmãos</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('studants.create')}}"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Incluir</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h3 class="title"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Incluir</h3>
            </div>

            <div class="inside">
            
                @include('admin.includes.alerts')
                
                <form action="{{ route('studants.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8">
                            <label for="name">Nome:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Nome do Irmão">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="registration">Matrícula:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-passport" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <input type="text" name="registration" class="form-control" placeholder="Matrícula">
                            </div>
                        </div>
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-3">
                            <label for="date_of_birth">Data de Nascimento:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-calendar-alt" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <input type="text" name="date_of_birth" class="form-control" placeholder="Data de Nascimento">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cell">Celular:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-mobile-alt" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <input type="text" name="cell" class="form-control" placeholder="Número Celular">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-at" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <input type="text" name="email" class="form-control" placeholder="Endereço de email">
                            </div>
                        </div>
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-6">
                            <label for="street">Rua:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-road"></i>
                                    </span>
                                </div>
                                <input type="text" name="street" class="form-control" placeholder="Rua">
                            </div>   
                        </div>
                    
                        <div class="col-md-3">
                            <label for="number">Número:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-sort-numeric-up-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="number" class="form-control" placeholder="Número">
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <label for="complement">Complemento:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basuc-addon1">
                                        <i class="fa fa-keyboard"></i>
                                    </span>
                                </div>
                                <input type="text" name="complement" class="form-control" placeholder="Número">
                            </div>   
                        </div>                        
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-3">
                            <label for="neighborhood">Bairro:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basuc-addon1">
                                        <i class="fa fa-keyboard"></i>
                                    </span>
                                </div>
                                <input type="text" name="neighborhood" class="form-control" placeholder="Bairro">
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <label for="zipcode">CEP:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-keyboard"></i>
                                    </span>
                                </div>
                                <input type="text" name="zipcode" class="form-control" placeholder="CEP">
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <label for="city">Cidade:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basuc-addon1">
                                        <i class="fas fa-city"></i>
                                    </span>
                                </div>
                                <input type="text" name="city" class="form-control" placeholder="Cidade">
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <label for="state">Estado:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fab fa-usps"></i>
                                    </span>
                                </div>
                                <input type="text" name="state" class="form-control" placeholder="Estado">
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
    </div>
@endsection