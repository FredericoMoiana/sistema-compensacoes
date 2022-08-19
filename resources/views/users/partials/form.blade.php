@csrf
<div class="card-body">
    @include('users.partials.validations')
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="name" name="name" value="{{ $user->name ?? old('name') }}" class="form-control" id="name"
            placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email ?? old('email') }}" class="form-control"
            id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
            placeholder="Password">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-secondary">Submit</button>
</div>
