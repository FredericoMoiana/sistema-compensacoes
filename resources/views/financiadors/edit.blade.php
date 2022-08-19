@extends('adminlte::page')

@section('title', 'Editar Financiador')

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    <h3 class="card-title">Editar Financiador {{ $financiador->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action=" {{ route('financiadors.update', $financiador->id) }} " method="post">
                    @method('put')
                    @include('financiadors.partials.form')
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
