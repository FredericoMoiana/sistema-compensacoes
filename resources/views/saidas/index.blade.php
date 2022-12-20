@extends('adminlte::page')

@section('title', 'Lista de Saidas')
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ route('saidas.index') }} " method="get">
                        <section class="content">
                            <div class="container-fluid">
                                <h2 class="text-center display-4">Pesquisa</h2>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <form action="simple-results.html">
                                            <div class="input-group">
                                                <input type="search" name="search" class="form-control form-control-lg"
                                                    placeholder="Type your keywords here">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-lg btn-default">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Lista de Saidas</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('saidas.create') }}" class="btn-sm btn-secondary">Adicionar</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Projecto</th>
                                                <th>Participante</th>
                                                <th>Valor</th>
                                                <th>Visita</th>
                                                <th>Data</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($saidas as $saida)
                                                <tr>
                                                    <td>{{ $saida->acronimo }}</td>
                                                    <td>{{ $saida->codigo }}</td>
                                                    <td>{{ number_format($saida->valor, 2) . ' MT' }}</td>
                                                    <td>{{ $saida->visita }}</td>
                                                    <td>{{ $saida->created_at }}</td>
                                                    <td>
                                                        <form action=" {{ route('saidas.delete', $saida->id) }} "
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <div class="btn-group">
                                                                <a role="button" class="btn btn-outline-secondary"
                                                                    href="{{ route('saidas.edit', $saida->id) }}"><i
                                                                        class="fas fa-pencil-alt"></i></a>
                                                                <button role="button" type="submit"
                                                                    class="btn btn-outline-secondary"
                                                                    href="{{ route('saidas.edit', $saida->id) }}"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.datatable')
@endsection
