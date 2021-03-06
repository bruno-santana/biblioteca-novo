@extends('admin.master.master')

@section('title', 'Livros Emprestados')

@section('breadcrumb')
  <li class="breadcrumb-item">
    <a href="{{route('borroweds.index')}}">
      <i class="fas fa-book-reader" aria-hidden="true"></i>
      &nbsp;Empréstimos
    </a>
  </li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="panel shadow">
    <div class="header">
      <h3 class="title">
        <i class="fas fa-book-reader" aria-hidden="true"></i>
        &nbsp;Livros Emprestados
      </h3>
    </div>
  </div>

  <div class="inside">
    <div class="mtop16">
      @include('admin.includes.alerts')
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="btns" style="margin-left: 16px">
          <a href="{{ route('borroweds.create')}}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            &nbsp;Novo
          </a>
        </div>
      </div>

      <div class="col-md-9">
        <div class="col-md-12">
          {!! Form::open(['route' => 'borroweds.search']) !!}
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fas fa-search"></i>
              </span>
            </div>
            {!! Form::text('filter', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome do irmão', 'required']) !!}
            <button class="btn btn-success" type="submit" id="button-addon2">
              Buscar
            </button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>

    <div class="row mtop16">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="col-3">Titulo</th>
                <th scope="col" class="col-2">Emprestado a</th>
                <th scope="col" class="col-2">Emprestado em</th>
                <th scope="col" class="col-2">Prazo para devolver</th>
                <th scope="col" class="col-2">Situação</th>
                <th scope="col" class="col-1">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($borroweds as $borrowed)
                <tr>
                  <th scope="row">{{ strtoupper($borrowed->libro->name) }}</th>
                  <td>{{ strtoupper($borrowed->studant_name) }}</td>
                  <td>{{ strtoupper($borrowed->studant_name) }}</td>
                  <td>{{ date( 'd/m/Y' , strtotime($borrowed->token_returned)) }}</td>
                  @if ($borrowed->situation == 'ATRASADO')
                    <td class="col-2" style="color: red;">
                      {{ strtoupper($borrowed->situation) }}
                    </td>
                  @else
                    <td class="col-2" style="color: green;">
                      {{ strtoupper($borrowed->situation) }}
                    </td>
                  @endif
                  <td>
                    <a style="margin: 6px" href="{{ url('/admin/borrowed/'.$borrowed->id.'/giveBack') }}" data-toggle="tooltip" data-placement="top" title="Devolver">
                      <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    </a>
                    <a style="margin: 6px" href="{{ url('/admin/borrowed/'.$borrowed->id.'/destroy') }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                      <i class="fa fa-trash-alt" aria-hidden="true"></i>
                    </a>
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
@endsection
