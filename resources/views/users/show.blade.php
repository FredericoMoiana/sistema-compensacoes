@extends('layouts.app1')

@section('titulo', 'Detalhes do Usuário')

@section('conteudo')
<h1>Detalhes do Usuário {{ $user -> name}}</h1>

<ul>
    <li> {{$user ->email}} </li>
    <li> {{$user ->password}} </li>
    <li> {{$user ->created_at}} </li>
</ul>

<form action=" {{ route('users.delete', $user->id) }} " method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">Deletar</button>
</form>

@endsection
