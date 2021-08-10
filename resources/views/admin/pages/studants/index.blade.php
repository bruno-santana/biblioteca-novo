@extends('admin.master.master')

@section('title', 'Irmãos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('admin/studants')}}"><i class="fas fa-address-book" aria-hidden="true"></i> Irmãos</a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h3 class="title"><i class="fas fa-address-book" aria-hidden="true"></i> Irmãos</h3>
        </div>
      
        </div>

        <div class="inside">
    
            <div class="mtop16">
                @include('admin.includes.alerts')
            </div>

           
            <div class="btns" style="margin-left: 16px">
               <a href="{{ route('studants.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Novo
                </a>
            </div>
          

            <div class="col-md-12 mtop16">
                {!! Form::open(['route' => 'studants.search']) !!}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    {!! Form::text('filter', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome ou a matrícula do irmão', 'required']) !!}
                    <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-fixed mtop16">
                    <thead>
                        <tr>
                            <th scope="col" class="col-4">Nome</th>
                            <th scope="col" class="col-1">Matrícula</th>
                            <th scope="col" class="col-3">Endereço</th>
                            <th scope="col" class="col-2">Celular</th>
                            <th scope="col" class="col-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studants as $studant)
                            <tr>
                                <td scope="row" class="col-4">{{ $studant->name }}</td>
                                <td class="col-1">{{ $studant->registration }}</td>
                                <td class="col-3">{{ $studant->street }}</td>
                                <td class="col-2">{{ $studant->cell }}</td>
        
                                <td class="col-2">
                                    <div class="opts">
                                        <a href="{{ route('studants.show', $studant->id) }}" data-toggle="tooltip" data-placement="top" title="Informações do irmão">
                                            <i class="fas fa-address-book"></i></a>
                                    
                                        <a href="{{ route('studants.edit', $studant->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>                                        
                                        
                                        <a href="{{ url('/admin/studant/'.$studant->id.'/destroy') }}" data-toggle="tooltip" data-placement="top" title="Excluir">
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
@endsection