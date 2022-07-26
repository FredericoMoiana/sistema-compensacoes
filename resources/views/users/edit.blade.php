@extends('layouts.app1')

@section('titulo', 'Editar Usuário')

@section('conteudo')
<h1>Editar Usuário {{$user->name}}</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action=" {{ route('users.update', $user->id) }} " method="post">
    @method('put')
    @include('users/partials/form')
</form>

@endsection
