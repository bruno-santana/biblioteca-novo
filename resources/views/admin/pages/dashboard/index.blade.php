@extends('admin.master.master')

@section('title', 'Início')

@section('content')
    <div class="container-fluid">
        <div class="panel shadow" style="padding:12px">
            <div class="header">
                <h3 class="title"><i class="fas fa-chart-bar" aria-hidden="true"></i> Estatíticas</h3>
            </div>

            <div class="row mtop16">
                <div class="col-md-3">
                    <div class="panel shadow">
                        <div class="header">
                            <h3 class="title"><i class="fas fa-users" aria-hidden="true"></i> Usuários</h3>
                        </div>
                        <div class="inside">
                            <div class="big_count">{{ $totalUsers }}</div>
                        </div>
                        <div class="infor">
                            <a href="{{route('users.index')}}">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                    </div>
                </div>

                    <div class="col-md-3">
                        <div class="panel shadow">
                            <div class="header">
                                <h3 class="title"><i class="fas fa-address-book" aria-hidden="true"></i> Irmãos</h3>
                            </div>
                            <div class="inside">
                                <div class="big_count">{{ $totalStudants }}</div>
                            </div>
                            <div class="infor">
                                <a href="{{route('studants.index')}}">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                             </div>
                        </div>
                    </div>

                <div class="col-md-3">
                    <div class="panel shadow">
                        <div class="header">
                            <h3 class="title"><i class="fas fa-book" aria-hidden="true"></i> Livros</h3>
                        </div>
                        <div class="inside">
                            <div class="big_count">{{ $totalLibros }}</div>
                        </div>
                        <div class="infor">
                            <a href="{{route('libros.index')}}">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel shadow">
                        <div class="header">
                            <h3 class="title"><i class="fas fa-book-reader" aria-hidden="true"></i> Empréstimos</h3>
                        </div>
                        <div class="inside">
                            <div class="big_count">{{ $totalBorroweds }}</div>
                        </div>
                        <div class="infor">
                           <a href="{{route('borroweds.index')}}">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel shadow" style="padding:12px; margin-top:24px;">
            <div class="header">
                <h3 class="title">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    &nbsp;Empréstimos em atraso
                </h3>
            </div>
            @if ($atrasados)
                <div class="row mtop16">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-fixed mtop16">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-5">Titulo</th>
                                        <th scope="col" class="col-3">Emprestado a</th>
                                        <th scope="col" class="col-2">Emprestado em</th>
                                        <th scope="col" class="col-2">Prazo para devolver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atrasados as $atrasado)
                                        <tr>
                                            <td scope="row" class="col-5">{{ strtoupper($atrasado->libro->name) }}</td>
                                            <td class="col-3">{{ strtoupper($atrasado->studant_name) }}</td>
                                            <td class="col-2">{{ date( 'd/m/Y' , strtotime($atrasado->token_borrowed)) }}</td>
                                            <td class="col-2">{{ date( 'd/m/Y' , strtotime($atrasado->token_returned)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <h5 style="margin: 12px">
                    Não há empréstimos em atraso
                </h5>
            @endif
            
        </div>
    </div>
@endsection
