@csrf
<div class="card-body">
    @include('saidas.partials.validations')
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
        <label for="name">Participante</label>
        <select class="form-control" name="participante_id">
            @if (isset($participante))
                <option value="{{ $participante->id }}" selected> {{ $participante->codigo }}</option>
                @foreach ($participantes as $participante)
                    <option value="{{ $participante->id }}"> {{ $participante->codigo }}</option>
                @endforeach
            @else
                @foreach ($participantes as $participante)
                    <option value="{{ $participante->id }}"> {{ $participante->codigo }}</option>
                @endforeach
            @endif
        </select>
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
