<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
</head>

<body>
    <form action="{{ route('newPassword.process') }}" method="POST">
        @csrf
        <h1>Nouveau mot de passe</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                { !! implode('', $errors->all('<li>:message</li>')) !! }
            </ul>
        @endif

        @if ($message = Session::get('error'))
            <div>{{ $message }}</div><br />
        @endif

        @if ($message = Session::get('success'))
            <div>{{ $message }}</div><br />
        @endif

        <label for="password">Nouveau mot de passe</label><br />
        <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici ... "><br /><br />

        <input type="hidden" name="email" id="email" value="{{ session()->get('email') }}">
        <input type="hidden" name="code" id="code" value="{{ session()->get('code') }}">

        <label for="passwordConfirm">Confirmer nouveau de passe</label><br />
        <input type="password" name="passwordConfirm" id="passwordConfirm"
            placeholder="Confirmer le nouveau mot de passe ici ... "><br /><br />

        <button type="submit">Soumettre</button>
    </form>
</body>

</html>
