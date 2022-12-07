@extends('adminlte::page')

@section('title', 'Projectos por Mês')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ route('graficos.projecto.mes') }} " method="get">
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
                        <div class="col-12">
                            <div class="card card-primary mt-2">
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
                                    <canvas id="myChart"></canvas>
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
        var dados = @json($dados);
    </script>
    <script>
        var keys = Object.keys(dados);
        var data = Object.values(dados);
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            data: {
                datasets: [{
                    type: 'bar',
                    label: 'Valor',
                    data: data
                }, ],
                labels: keys
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
