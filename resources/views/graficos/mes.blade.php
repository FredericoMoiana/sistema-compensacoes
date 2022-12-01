@extends('adminlte::page')

@section('title', 'Projectos por Mês')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ route('graficos.mes') }} " method="get">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
