@extends('adminlte::page')

@section('title', 'Realizar Entrada')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    <h3 class="card-title">Nova Entrada</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('entradas.store') }}" method="post">
                    @csrf
                    @include('entradas/partials/form')
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
