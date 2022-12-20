@extends('adminlte::page')

@section('title', 'Lista de Usuários')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    {{-- <form action=" {{ route('users.index') }} " method="get">
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
                    </form> --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Lista de Usuários</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('users.create') }}" class="btn-sm btn-secondary">Adicionar</a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <form action=" {{ route('users.delete', $user->id) }} "
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <div class="btn-group">
                                                                <a role="button" class="btn btn-outline-secondary"
                                                                    href="{{ route('users.edit', $user->id) }}"><i
                                                                        class="fas fa-pencil-alt"></i></a>
                                                                <button role="button" type="submit"
                                                                    class="btn btn-outline-secondary"
                                                                    href="{{ route('users.edit', $user->id) }}"><i
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
    @include('layouts.datatable')
@endsection
