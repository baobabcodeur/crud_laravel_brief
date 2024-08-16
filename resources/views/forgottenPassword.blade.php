<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
</head>

<body>

    <a href="{{ route('login') }}">
        Retour
    </a>
    
    <form action="{{ route('forgottenPassword.process') }}" method="POST">
        @csrf
        <h1>Mot de passe oublié</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                {!! implode('', $errors->all('<li>:message</li>')) !!}
            </ul>
        @endif

        @if ($message = Session::get('error'))
            <div>{{ $message }}</div><br />
        @endif

        @if ($message = Session::get('success'))
            <div>{{ $message }}</div><br />
        @endif

        <label for="email">Email</label><br />
        <input type="text" name="email" id="email" placeholder="Saisir l'e-mail ici ... "><br /><br />

        <button type="submit">Soumettre</button>
    </form>
</body>

</html>
