<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Authentification</title>
</head>

<body>

<div class="form-container">
      <form action="{{ route('login.process') }}" method="post">
        @csrf
        <h2>Connexion</h2>

        @if ($errors->any())
        <ul>
            {!! implode('', $errors->all('<li>:message</li>')) !!}
        </ul>
        @endif

       
        <div class="form-group">
            <label for="email">Email</label> <br>
            <input type="text" name="email" id="email" placeholder="Saisir l'e-mail ici ..."> <br> <br>

        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label> <br>
            <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici ..."> <br> <br>
            <a href="{{ route('forgottenPassword') }}" >Mot de passe oublier</a> <br> <br>
        </div>


        

        <button type="submit" class="btn">Soumettre</button>
    </form>
</div>
  
</body>

</html>