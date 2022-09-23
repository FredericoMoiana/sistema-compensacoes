@extends('adminlte::page')

@section('title', 'Editar Entrada')

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    <h3 class="card-title">Editar Entrada {{ $entrada->id }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action=" {{ route('entradas.update', $entrada->id) }} " method="post">
                    @method('put')
                    @include('entradas.partials.form')
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
