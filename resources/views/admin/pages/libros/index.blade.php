@extends('admin.master.master')

@section('title', 'Livros')

@section('breadcrumb')
  <li class="breadcrumb-item">
    <a href="{{url('/admin/libros')}}">
      <i class="fas fa-book" aria-hidden="true"></i> Livros
    </a>
  </li>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="panel shadow">
      <div class="header">
        <h3 class="title">
          <i class="fas fa-book" aria-hidden="true"></i> Livros 
        </h3>
        <span class="float-right mt-3" style="margin-right: 16px">
          Último livro adicionado: <strong>{{ $last->code}}</strong> - {{$last->name}}
        </span>
      </div>
    </div>

    <div class="inside">
    
      <div class="mtop16">
        @include('admin.includes.alerts')
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="btns" style="margin-left: 16px">
            <a href="{{ route('libros.create')}}" class="btn btn-primary">
              <i class="fa fa-plus"></i> Novo
            </a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            {!! Form::open(['route' => 'libros.search']) !!}
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-search"></i>
                </span>
              </div>
              {!! Form::text('filter', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome ou o código do livro', 'required']) !!}
              <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>

      <div class="row mtop16">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped table-fixed mtop16">
              <thead>
                <tr>
                  <th scope="col" class="col-3">Código</th>
                  <th scope="col" class="col-7">Nome</th>                          
                  <th scope="col" class="col-2">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($libros as $libro)
                <tr>
                  <td scope="row" class="col-3">
                    {{ $libro->code }}
                  </td>
                  <td class="col-7">
                    {{ $libro->name }}
                    @if ($libro->status == true)
                     - <span style="color: red;">EMPRESTADO</span>
                    @endif
                  </td>
                  <td class="col-2">
                    <div class="opts">
                      <a href="{{ route('libros.edit', $libro->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                      </a>
                      
                      <a href="{{ url('/admin/libro/'.$libro->id.'/destroy') }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                        <i class="fa fa-trash-alt" aria-hidden="true"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="d-flex justify-content-center">
              {{ $libros->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection