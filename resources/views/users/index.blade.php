@extends('layouts.app')
<style>
    a{
    text-decoration: none;
    color: black;
}
.btn {
    width: 30%;
    padding: 10px;
    background-color:#0056b3;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.btn:hover {
    background-color: #0056b3;
}
</style>

@section('content')
<div class="container">
    <h1>les comptes</h1>
    <table id="etudiants-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Role</th>
                <th>Operation</th>
            </tr>
        </thead>

        <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                        {{ $user->name }}
                        </td>
                        <td>
                        {{ $user->email }}

                        </td>
                        <td>
                        {{ $user->password }}
                        </td>

                        <td>
                        {{ $user->role }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('users.edit', $user->id) }}" class="icon-button primary">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            &nbsp;
                            <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer la catégorie {{ $user->name }} ? Cette action sera irréversible !')">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="icon-button error">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
    </table>


    <button class="btn"><a href=" {{ route('register') }} ">Ajouter un ulilisateur</a> </button>
</div>



@endsection