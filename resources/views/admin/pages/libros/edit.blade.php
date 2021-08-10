@extends('admin.master.master')

@section('title', 'Editar Livro')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('admin/libros')}}"><i class="fas fa-book" aria-hidden="true"></i> Livros</a>
    </li>
    <li class="breadcrumb-item">
        <a href=""><i class="fa fa-edit" aria-hidden="true"></i> Editar Livro</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel shadow">
                    <div class="header">
                        <h3 class="title"><i class="fa fa-edit" aria-hidden="true"></i> Editar Livro || {{ $l->code }} || {{ $l->name }}</h3>
                    </div>
        
                    <div class="inside">
                        @include('admin.includes.alerts')
        
                        <form action="{{ route('libros.postupdate',$l->id) }}" method="POST">
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
                                        <input type="text" name="name" class="form-control" placeholder="Título do Livro" value="{{ $l->name }}">
                                    </div>   
                                </div>
        
                                <div class="col-md-3">
                                    <label for="isbn">ISBN:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basuc-addon1">
                                                <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <input type="text" name="isbn" class="form-control" placeholder="ISBN do Livro" value="{{ $l->isbn }}">
                                    </div>   
                                </div>
        
                                <div class="col-md-3">
                                    <label for="category">Categoria:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basuc-addon1">
                                                <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <select name="category_id" class="form-control">
                                            <option value="" disabled selected>Categorias...</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}" {{ $l->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }} </option>
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
                                            <span class="input-group-text" id="basuc-addon1">
                                                <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <select name="nationality" class="form-control">
                                            <option value="" disabled selected>Nacionalidades...</option>
                                            <option value="1" {{ $l->nationality == 1 ? 'selected' : '' }}>Nacional</option>
                                            <option value="2" {{ $l->nationality == 2 ? 'selected' : '' }}>Estrangeira</option>
                                        </select>
                                    </div>   
                                </div>
        
                                <div class="col-md-3">
                                    <label for="column">Coluna:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basuc-addon1">
                                                <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <select name="column" class="form-control">
                                            <option value="" disabled selected>Colunas...</option>
                                            <option value="A" {{ $l->column == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="B" {{ $l->column == 'B' ? 'selected' : '' }}>B</option>
                                            <option value="C" {{ $l->column == 'C' ? 'selected' : '' }}>C</option>
                                            <option value="D" {{ $l->column == 'D' ? 'selected' : '' }}>D</option>
                                        </select>
                                    </div>   
                                </div>
        
                                <div class="col-md-3">
                                    <label for="line">Linha:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basuc-addon1">
                                                <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <select name="line" class="form-control">
                                            <option value="" disabled selected>Linhas...</option>
                                            <option value="1" {{ $l->line == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ $l->line == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ $l->line == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ $l->line == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ $l->line == '5' ? 'selected' : '' }}>5</option>
                                            <option value="6" {{ $l->line == '6' ? 'selected' : '' }}>6</option>
                                        </select>
                                    </div>   
                                </div>
        
                                <div class="col-md-3">
                                    <label for="position">Localização:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basuc-addon1">
                                                <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                            </span>
                                        </div>
                                        <select name="position" class="form-control">
                                            <option value="" disabled selected>Localização...</option>
                                            <option value="1"{{ $l->position == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2"{{ $l->position == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3"{{ $l->position == '3' ? 'selected' : '' }}>3</option>
                                        </select>
                                    </div>   
                                </div>
                            </div>
                            
                            <div class="row mtop16">
                                <div class="col-md-12">
                                    <label for="description">Descrição:</label>
                                    <textarea class="form-control" name="description" id="description" rows="5" placeholder="Breve descrição do Livro">{{ $l->description }}</textarea>
                                </div>
                            </div>

                            <div class="row mtop16">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Atualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>                
        </div>                
    </div>
@endsection