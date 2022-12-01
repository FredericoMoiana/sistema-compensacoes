@csrf
<div class="card-body">
    @include('entradas.partials.validations')
    <div class="form-group">
        <label for="name">Financiador</label>
        <select class="form-control" name="financiador_id">
            @if (isset($financiador))
                <option value="{{ $financiador->id }}" selected> {{ $financiador->name }}</option>
                @foreach ($financiadores as $financiador)
                    <option value="{{ $financiador->id }}"> {{ $financiador->name }}</option>
                @endforeach
            @else
                @foreach ($financiadores as $financiador)
                    <option value="{{ $financiador->id }}"> {{ $financiador->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="name">Projecto</label>
        <select class="form-control" name="projecto_id">
            @if (isset($projecto))
                <option value="{{ $projecto->id }}" selected> {{ $projecto->acronimo }}</option>
                @foreach ($projectos as $projecto)
                    <option value="{{ $projecto->id }}"> {{ $projecto->acronimo }}</option>
                @endforeach
            @else
                @foreach ($projectos as $projecto)
                    <option value="{{ $projecto->id }}"> {{ $projecto->acronimo }}</option>
                @endforeach
            @endif
        </select>
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
