@extends('adminlte::page')

@section('title', 'Lista de Participantes')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ route('participantes.index') }} " method="get">
                        <section class="content">
                            <div class="container-fluid">
                                <h2 class="text-center display-4">Search</h2>
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
                                    <h3 class="card-title">Lista de Participantes</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('participantes.create') }}" class="btn-sm btn-secondary">Adicionar</a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>#</th>
                                                <th>Código</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($participantes as $participante)
                                                <tr>
                                                    <td>{{ $participante->id }}</td>
                                                    <td>{{ $participante->codigo }}</td>
                                                    <td>
                                                        <form action=" {{ route('participantes.delete', $participante->id) }} "
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <div class="btn-group">
                                                                <a role="button" class="btn btn-outline-secondary"
                                                                    href="{{ route('participantes.edit', $participante->id) }}"><i
                                                                        class="fas fa-pencil-alt"></i></a>
                                                                <button role="button" type="submit"
                                                                    class="btn btn-outline-secondary"
                                                                    href="{{ route('participantes.edit', $participante->id) }}"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
