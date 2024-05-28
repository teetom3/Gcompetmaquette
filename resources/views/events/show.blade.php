@include('header')

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

<div class="container">
        <h1>{{ $event->name }}</h1>
        <p><strong>Catégorie :</strong> {{ $event->category }}</p>
        <p><strong>Date :</strong> {{ $event->date_event }}</p>
        <p><strong>Places disponibles :</strong> {{ $event->places_available }}</p>
        <p><strong>Description :</strong> {{ $event->description }}</p>
        <p><strong>Image :</strong></p>
        <img src="{{ asset('storage/images/' . $event->image) }}" width="300">

        <a href="{{ route('welcome') }}" class="btn btn-primary">Retour à la liste des événements</a>
    
        @auth
        @if ($event->users->contains(Auth::user()))
            <form id="unregister-form" action="{{ route('events.unregister', $event) }}" method="POST">
                @csrf
                
                
                
            </form>
            <!-- Lien de déconnexion -->
    <a href="{{ route('events.unregister', $event) }}"
       onclick="event.preventDefault();
                 document.getElementById('unregister-form').submit();">
        Se désinscrire
    </a>
        @else
            <form id="register-form" action="{{ route('events.register', $event) }}" method="POST">
                @csrf
                
            </form>
            <a href="{{ route('events.register', $event) }}"
       onclick="event.preventDefault();
                 document.getElementById('register-form').submit();">
        S'inscrire
    </a>
        @endif
    @endauth
    
    </div>



@include('footer')