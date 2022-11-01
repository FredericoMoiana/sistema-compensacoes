@extends('adminlte::page')

@section('title', 'Adicionar saida')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    <h3 class="card-title">Novo saida</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('saidas.store') }}" method="post">
                    @csrf
                    @include('saidas/partials/form')
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
