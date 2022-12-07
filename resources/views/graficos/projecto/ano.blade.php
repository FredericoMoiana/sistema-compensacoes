@extends('adminlte::page')

@section('title', 'Projectos por Ano')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ route('graficos.projecto.ano') }} " method="get">
                        <section class="content">
                            <div class="container-fluid">
                                <h2 class="text-center display-4">Pesquisa</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" value="{{ old('data') }}"
                                            name="data">
                                    </div>
                                    <div class="col-md-6">
                                        <form action="simple-results.html">
                                            <div class="input-group">
                                                <select class="form-control" name="projecto_id">
                                                    @foreach ($projectos as $projecto)
                                                        <option value="{{ $projecto->id }}"> {{ $projecto->acronimo }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
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
                        <div class="col-9">
                            <div class="card card-secondary mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">Bar Chart</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="myBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card card-secondary mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">Pie Chart</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var dadosPie = @json($dadosPie);
        var dadosBar = @json($dadosBar);
        var months = @json($months);
    </script>
    <script>
        var keys = Object.keys(dadosPie);
        var keysBar = Object.keys(dadosBar);
        var data = Object.values(dadosPie);
        console.log(months);
        var dataBar = Object.values(dadosBar);
        var data1 = [dataBar[0][0],dataBar[1][0],dataBar[2][0],dataBar[3][0],dataBar[4][0],dataBar[5][0],dataBar[6][0],dataBar[7][0],dataBar[8][0],dataBar[9][0],dataBar[10][0],dataBar[11][0]];
        var data2 = [dataBar[0][1],dataBar[1][1],dataBar[2][1],dataBar[3][1],dataBar[4][1],dataBar[5][1],dataBar[6][1],dataBar[7][1],dataBar[8][1],dataBar[9][1],dataBar[10][1],dataBar[11][1]];
        var data3 = [dataBar[0][2],dataBar[1][2],dataBar[2][2],dataBar[3][2],dataBar[4][2],dataBar[5][2],dataBar[6][2],dataBar[7][2],dataBar[8][2],dataBar[9][2],dataBar[10][2],dataBar[11][2]];

        const ctx = document.getElementById('myBarChart');
        const cty = document.getElementById('myPieChart');
        new Chart(ctx, {
            data: {
                datasets: [
                    {type: 'bar', label: 'Saldo', data: data1 },
                    {type: 'bar', label: 'Valor Gasto', data: data2 },
                    {type: 'bar', label: 'Valor Alocado', data: data3 },
                ],
                labels: months
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        new Chart(cty, {
            type: 'pie',
            data: {
                labels: keys,
                datasets: [{
                    label: 'Valor',
                    data: data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
