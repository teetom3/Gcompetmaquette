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

    @if (Auth::check() && Auth::user()->is_admin)
        <a href="{{ route('events.admin.register', $event->id) }}" class="btn btn-primary">Inscrire des joueurs</a>
        <a href="{{ route('events.downloadRegistrations', $event->id) }}" class="btn btn-secondary">Récupérer les inscrits</a>
    @endif



    <h2>Joueurs Inscrits</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Prénom</th>
                <th>Index</th>
            </tr>
        </thead>
        <tbody>
            @forelse($event->users as $user)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->firstname }}" width="50" height="50">
                    </td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->golf_index }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Aucun joueur inscrit.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    </div>



@include('footer')