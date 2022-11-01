@csrf
<div class="card-body">
    @include('entradas.partials.validations')
    <div class="form-group">
        <label for="name">Financiador</label>
        <input type="name" name="financiador" value="{{ $entrada->financiador_id->name ?? old('name') }}" class="form-control" id="name"
            placeholder="Enter name">
    </div>
    {{-- <select>
        @foreach($data2 as $ctg)
           <option value="{{ $ctg->id }}">{{ $ctg->ctg_name }}</option>
        @endforeach
        </select> --}}
    <div class="form-group">
        <label for="name">Projecto</label>
        <input type="name" name="projecto" value="{{ $entrada->projecto_id->acronimo ?? old('projecto') }}" class="form-control" id="name"
            placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="data">Data</label>
        <input type="date" name="data" value="{{ $entrada->data ?? old('data') }}" class="form-control"
            id="data" placeholder="Enter data">
    </div>
    <div class="form-group">
        <label for="valor">Valor</label>
        <input type="text" name="valor" value="{{ $entrada->valor ?? old('valor') }}" class="form-control"
            id="valor" placeholder="Enter valor">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-secondary">Submit</button>
</div>
