@extends('adminlte::page')

@section('title', 'Lista de Projectos')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ route('projectos.index') }} " method="get">
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
                                    <h3 class="card-title">Lista de Projectos</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('projectos.create') }}" class="btn-sm btn-secondary">Adicionar</a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Acronimo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projectos as $projecto)
                                                <tr>
                                                    <td>{{ $projecto->id }}</td>
                                                    <td>{{ $projecto->acronimo }}</td>
                                                    <td>
                                                        <form action=" {{ route('projectos.delete', $projecto->id) }} "
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <div class="btn-group">
                                                                <a role="button" class="btn btn-outline-secondary"
                                                                    href="{{ route('projectos.edit', $projecto->id) }}"><i
                                                                        class="fas fa-pencil-alt"></i></a>
                                                                <button role="button" type="submit"
                                                                    class="btn btn-outline-secondary"
                                                                    href="{{ route('projectos.edit', $projecto->id) }}"><i
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
