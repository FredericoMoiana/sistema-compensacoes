@csrf
<div class="card-body">
    @include('participantes.partials.validations')
    <div class="form-group">
        <label for="codigo">Código</label>
        <input type="text" name="codigo" value="{{ $participante->codigo ?? old('codigo') }}" class="form-control"
            id="codigo" placeholder="Enter codigo">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-secondary">Submit</button>
</div>
