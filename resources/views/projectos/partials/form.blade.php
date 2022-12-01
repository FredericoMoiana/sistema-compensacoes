@csrf
<div class="card-body">
    @include('projectos.partials.validations')
    <div class="form-group">
        <label for="acronimo">Acrônimo</label>
        <input type="acronimo" name="acronimo" value="{{ $projecto->acronimo ?? old('acronimo') }}" class="form-control" id="acronimo"
            placeholder="Enter acronimo">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-secondary">Submit</button>
</div>
