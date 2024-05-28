<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un événement</title>
</head>
<body>

<header >
    
        
    <img class="logo_nav" src="" alt="Logo">
 
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
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        Logout
    </a>
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