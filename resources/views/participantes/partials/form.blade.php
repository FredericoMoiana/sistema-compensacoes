@csrf
<div class="card-body">
    @include('participantes.partials.validations')
    <div class="form-group">
        <label for="codigo">Código</label>
        <input type="text" name="codigo" value="{{ $participante->codigo ?? old('codigo') }}" class="form-control"
            id="codigo" placeholder="Enter codigo">
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
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-secondary">Submit</button>
</div>
