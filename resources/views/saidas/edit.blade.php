@extends('adminlte::page')

@section('title', 'Editar saida')

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    <h3 class="card-title">Editar saida {{ $saida->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action=" {{ route('saidas.update', $saida->id) }} " method="post">
                    @method('put')
                    @include('saidas.partials.form')
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
