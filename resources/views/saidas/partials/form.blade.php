@csrf
<div class="card-body">
    @include('saidas.partials.validations')
    <div class="form-group">
        <label for="projecto">Projecto</label>
        <input type="projecto" name="projecto_id" value="{{ getProjecto($id) ?? old('projecto_id') }}" class="form-control" id="name"
            placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="data">Data</label>
        <input type="date" name="data" value="{{ $saida->data ?? old('data') }}" class="form-control"
            id="data" placeholder="Enter data">
    </div>
    <div class="form-group">
        <label for="valor">Valor</label>
        <input type="text" name="valor" value="{{ $saida->valor ?? old('valor') }}" class="form-control"
            id="valor" placeholder="Enter valor">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-secondary">Submit</button>
</div>
