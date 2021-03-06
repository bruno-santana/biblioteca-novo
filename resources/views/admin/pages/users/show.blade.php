@extends('admin.master.master')

@section('title', 'Informações do usuário')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> Usuários</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('users.show', $user->id) }}"><i class="fas fa-user"></i> Informaçoẽs do usuário</a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h3 class="title"><i class="fa fa-edit" aria-hidden="true"></i> Informações do Usuário</h3>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="page_user">
        <div class="row">
            <div class="col-md-6 mtop16">
                <div class="panel shadow"  style="height: 230px">
                    <div class="inside">
                    @include('admin.includes.alerts')
                    <div class="mini_profile">
                        @if(is_null($user->avatar))
                            <img src="{{ url('/static/images/user-default.png') }}" class="img-fluid rounded-circle" style="max-width: 100px;">
                        @else
                            <img src="{{ url("storage/$user->avatar") }}" alt="{{ $user->name }}" style="max-width: 80px;">
                        @endif
                        <div class="info" style="padding-top: 18px">
                            <span class="title"><i class="far fa-address-card" aria-hidden="true"></i> Nome:</span>
                            <span class="text">{{ strtoupper($user->name) }}</span>
                        </div>
                    </div>
                           
                    </div>
                </div>
            </div>
                <div class="col-md-6 mtop16">
                    <div class="panel shadow" style="height: 230px">
                        <div class="inside">
                        @include('admin.includes.alerts')
                        <div class="mini_profile">
                            <div class="info">                                
                                <span class="title"><i class="fas fa-passport" aria-hidden="true"></i> Matrícula:</span>
                                <span class="text">{{ $user->registration }}</span>
                                <span class="title"><i class="far fa-envelope" aria-hidden="true"></i> Email:</span>
                                <span class="text">{{ strtoupper($user->email) }}</span>
                                <span class="title"><i class="far fa-calendar-alt" aria-hidden="true"></i> Registro:</span>
                                <span class="text">{{ $user->created_at->format('d/m/Y - H:i:s') }}</span>
                            </div>
                        </div>
                               
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
