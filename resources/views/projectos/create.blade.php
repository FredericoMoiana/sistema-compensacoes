@extends('adminlte::page')

@section('title', 'Adicionar Financiador')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    <h3 class="card-title">Novo Financiador</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('financiadors.store') }}" method="post">
                    @csrf
                    @include('financiadors/partials/form')
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
