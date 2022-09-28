@csrf
<div class="card-body">
    @include('projectos.partials.validations')
    <div class="form-group">
        <label for="acronimo">Acrônimo</label>
        <input type="acronimo" name="acronimo" value="{{ $projecto->acronimo ?? old('acronimo') }}" class="form-control" id="acronimo"
            placeholder="Enter acronimo">
    </div>
    <div class="form-group">
        <label for="saldo">Saldo</label>
        <input type="saldo" name="saldo" value="{{ $projecto->saldo ?? old('saldo') }}" class="form-control" id="saldo"
            placeholder="Enter saldo">
    </div>
    <div class="form-group">
        <label for="valorGasto">Valor Gasto</label>
        <input type="text" name="valorGasto" value="{{ $projecto->valorGasto ?? old('valorGasto') }}" class="form-control"
            id="valorGasto" placeholder="Enter valorGasto">
    </div>
    <div class="form-group">
        <label for="valorAlocado">Valor Alocado</label>
        <input type="text" name="valorAlocado" value="{{ $projecto->valorAlocado ?? old('valorAlocado') }}" class="form-control"
            id="valorAlocado" placeholder="Enter Valor Alocado">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-secondary">Submit</button>
</div>
