@csrf
<div class="card-body">
    @include('financiadors.partials.validations')
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="name" name="name" value="{{ $financiador->name ?? old('name') }}" class="form-control" id="name"
            placeholder="Enter name">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-secondary">Submit</button>
</div>
