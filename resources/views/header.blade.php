<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Gcompet</title>
</head>
<body>

<header class="navbar" >
    
        
    <img class="logo_nav" src="{{ asset('images/Logo.jpg') }}" alt="Logo">
 
  <nav class="nav_link">
    <ul>
      <li class="hideOnMobile"><a href="{{ route('welcome') }}">Accueil</a></li>
      
      <li class="hideOnMobile"><a href="{{route('players.index')}}">Liste des Joueurs</a></li>
      <li class="hideOnMobile"><a href="{{ route('profile.edit') }}">Mon Profile</a></li>
         <!-- Formulaire de déconnexion caché -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Lien de déconnexion -->
    <li><a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        Logout
    </a>
    </li>
      <li class="open_nav"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M130-248v-75h700v75H130Zm0-195v-75h700v75H130Zm0-195v-75h700v75H130Z"/></svg></a></li>
    </ul>
    @if(Auth::check() && Auth::user()->is_admin == 1)
    <ul class="admin_nav">
      <li class="hideOnMobile"><a href="{{ route('events.index') }}">Dashboard</a></li>
      <li class="hideOnMobile"><a href="{{ route('events.create') }}">Créer un Evenement</a></li>
      <li class="hideOnMobile"><a href="{{ route('admin.users.index') }}">Manager utilisateurs</a></li>
      </ul>
     
    @endif

  </nav>

</header>