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
                            <h3>150 | 50</h3>

                            <p>Saidas e Entradas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-money-bill-wave"></i>
                        </div>
                        <a href="{{ route('entradas.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>11</h3>

                            <p>Projectos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <a href="{{ route('projectos.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>10</h3>

                            <p>Financiadores</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <a href="{{ route('financiadors.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Participantes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <a href="{{ route('participantes.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            {{-- <div class="card">
                <div class="card-body">

                </div>
            </div> --}}
        </div>
    </div>
@stop
