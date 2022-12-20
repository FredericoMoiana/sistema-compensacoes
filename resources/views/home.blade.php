@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($entradas->sum('valor'), 2). ' MT' }}</h3>

                            <p>Entradas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-money-bill-wave"></i>
                        </div>
                        <a href="{{ route('entradas.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($saidas->sum('valor'), 2). ' MT' }}</h3>

                            <p>Saidas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-money-bill-wave"></i>
                        </div>
                        <a href="{{ route('saidas.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $projectos->count() }}</h3>

                            <p>Projectos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <a href="{{ route('projectos.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $financiadors->count() }}</h3>

                            <p>Financiadores</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <a href="{{ route('financiadors.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $participantes->count() }}</h3>

                            <p>Participantes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <a href="{{ route('participantes.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-11">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Projectos</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Acronimo</th>
                                                <th>Saldo</th>
                                                <th>Valor Gasto</th>
                                                <th>Valor Alocado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dados as $projecto)
                                                <tr>
                                                    <td>{{ $projecto[0] }}</td>
                                                    <td>{{ number_format($projecto[1], 2).' MT' }}</td>
                                                    <td>{{ number_format($projecto[2]).' MT' }}</td>
                                                    <td>{{ number_format($projecto[3]).' MT' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Financiadores</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Projecto</th>
                                                <th>Valor Alocado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($finSoma as $financiador)
                                                <tr>
                                                    <td>{{ $financiador->name }}</td>
                                                    <td>{{ $financiador->acronimo }}</td>
                                                    <td>{{ number_format($financiador->total, 2).' MT' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <div class="col-1">
                            <form action="{{ route('recuperar') }}" method="get">
                            <div class="form-group">
                                <label for="yearManufacture">Ano</label>
                                <input type="number" class="form-control" min="1980" max="<?php date('Y'); ?>"
                                     name="ano" placeholder="Pesquisa">
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
