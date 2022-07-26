@extends('layouts.app1')

@section('titulo', 'Adicionar Usuário')

@section('conteudo')
<h1>Novo Usuário</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf
    @include('users/partials/form')
</form>

@endsection
