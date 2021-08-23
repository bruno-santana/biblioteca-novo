@extends('admin.master.master')

@section('title', 'Novo Livro')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('libros.index')}}"><i class="fas fa-book" aria-hidden="true"></i> Livros</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('libros.create')}}"><i class="fas fa-book" aria-hidden="true"></i> Novo Livro</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h3 class="title"><i class="fa fa-plus" aria-hidden="true"></i> Novo Livro</h3>
            </div>

            <div class="inside">
            
                @include('admin.includes.alerts')

                <form action="{{ route('libros.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nome:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Título do Livro">
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <label for="isbn">ISBN:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <input type="text" name="isbn" class="form-control" placeholder="ISBN do Livro">
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <label for="category">Categoria:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <select name="category_id" class="form-control">
                                    <option value="" disabled selected>Categorias...</option>
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }} </option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-3">
                            <label for="nationality">Nacionalidade:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <select name="nationality" class="form-control">
                                    <option value="" disabled selected>Nacionalidades...</option>
                                    <option value="1">Nacional</option>
                                    <option value="2">Estrangeira</option>
                                </select>
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <label for="column">Coluna:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <select name="column" class="form-control">
                                    <option value="" disabled selected>Colunas...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <label for="line">Linha:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <select name="line" class="form-control">
                                    <option value="" disabled selected>Linhas...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>   
                        </div>

                        <div class="col-md-3">
                            <label for="position">Localização:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                <select name="position" class="form-control">
                                    <option value="" disabled selected>Localização...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>   
                        </div>
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-12">
                            <label for="description">Descrição:</label>
                            <textarea class="form-control" name="description" id="description" rows="8" placeholder="Breve descrição do Livro"></textarea>
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