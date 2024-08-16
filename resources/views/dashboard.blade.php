<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Authentification</title>

</head>

<body>
<div>
     <h1>Tableau de bord</h1>

    <hr>
    <h3>Bienvenue {{ Auth::user()->name }}</h3>
    <hr>
    <a class="styled-link" href="{{ route('logout') }}">
        Se déconnecter
    </a>
</div>
   <div>
    <button><a href="{{ route('dashboard') }}"> Dashboard</a></button>
   </div>
</body>

</html>