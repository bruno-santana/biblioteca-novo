<style>
    #btn-buscar{
        color:#fff;
        background-color:#28a745;
        border-color:#28a745
    }
    #btn-buscar:hover{
        color:#fff;
        background-color:#218838;
        border-color:#1e7e34
    }
    #btn-buscar.focus,#btn-buscar:focus{
        color:#fff;
        background-color:#218838;
        border-color:#1e7e34;
        box-shadow:0 0 0 .2rem rgba(72,180,97,.5)
    }
</style>

@extends('admin.master.master')

@section('title', 'Categorias')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('/admin/categories/0')}}">
            <i class="fa fa-folder-open" aria-hidden="true"></i> Categorias
        </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
       <div class="row">
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h3 class="title"><i class="fa fa-plus" aria-hidden="true"></i> Nova Categoria</h3>
                    </div>
 
                    <div class="mtop16">
                        @include('admin.includes.alerts')
                   </div>
                   
                    <div class="inside">
                        {!! Form::open(['route' => 'categories.store']) !!}
                            <label for="name">Nome:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                {!! Form::text('name', null,  [ 'class' => 'form-control']) !!}
                            </div>   

                            <label for="module" class="mtop16">Módulo:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basuc-addon1">
                                        <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                {!! Form::select('module', ['0' => 'Livros'], 0, ['class' => 'custom-select']) !!}
                            </div>  
 
                            <label for="description" class="mtop16">Descrição:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basuc-addon1">
                                        <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                {!! Form::text('description', null,  [ 'class' => 'form-control']) !!}
                            </div>   
                   
                            {!! Form::submit('Cadastar', [ 'class' => 'btn btn-success mtop16']) !!} 
                        {!! Form::close() !!}
                    </div>                   
                </div>   
            </div>

            <div class="col-md-9">
                <div class="panel shadow">
                    <div class="header">
                        <h3 class="title">
                            <i class="fa fa-folder-open" aria-hidden="true"></i> Categoria
                        </h3>
                    </div>
 
                    <div class="inside">
                        <div class="row">                        
                            <div class="col-md-12">
                                {!! Form::open(['route' => 'categories.search']) !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        {!! Form::text('filter', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome da categoria', 'required']) !!}
                                        <button class="btn" type="submit" id="btn-buscar">Buscar</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-fixed mtop16">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-8">Nome</th>
                                        <th scope="col" class="col-4">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cats as $cat)
                                        <tr>
                                            <td scope="row" class="col-8">{{$cat->name}}</td>
                                            <td class="col-4">
                                                <div class="opts">
                                                    <a href="{{ route('categories.edit', $cat->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                
                                                    <a href="{{ url('/admin/category/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                                                        <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                                    </a> 
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
       </div>
    </div>
@endsection
