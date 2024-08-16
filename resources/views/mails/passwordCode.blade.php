<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
</head>
<body>
    <h1>Bonjour {{ $user->name }}</h1>
    <p>Votre compte a été créer avec succès.</p>
    <p>Votre mot de passe temporaire est : <strong>{{ $password }}</strong></p>
    
</body>
</html>