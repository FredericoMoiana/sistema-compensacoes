@csrf
<div class="card-body">
    @include('financiadors.partials.validations')
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="name" name="name" value="{{ $financiador->name ?? old('name') }}" class="form-control" id="name"
            placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="data">Data</label>
        <input type="date" name="data" value="{{ $financiador->data ?? old('data') }}" class="form-control"
            id="data" placeholder="Enter data">
    </div>
    <div class="form-group">
        <label for="valor">Valor</label>
        <input type="text" name="valor" value="{{ $financiador->valor ?? old('valor') }}" class="form-control"
            id="valor" placeholder="Enter valor">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-secondary">Submit</button>
</div>
