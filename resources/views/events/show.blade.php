@include('header')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container">
    <h1 class="m-4">{{ $event->name }}</h1>
    <p><strong>Catégorie :</strong> {{ $event->category }}</p>
    <p><strong>Date :</strong> {{ $event->date_event }}</p>
    <p><strong>Places disponibles :</strong> {{ $event->places_available }}</p>
    <p><strong>Description :</strong> {{ $event->description }}</p>
    
    @if($event->image)
                        <img class="card-img-top rounded" src="{{ asset('storage/' . $event->image) }}" style="width: 60%; ">
                        @else
                        <img class="card-img-top rounded" src="{{ asset('storage/image/default-event.jpg') }}" style="width: 60%; ">
                        @endif

    <a href="{{ route('welcome') }}" class="btn btn-outline-success m-4">Retour à la liste des événements</a>
    
    @auth
        @if ($event->users->contains(Auth::user()))
            <form id="unregister-form" action="{{ route('events.unregister', $event) }}" method="POST">
                @csrf
            </form>
            <a href="{{ route('events.unregister', $event) }}" onclick="event.preventDefault(); document.getElementById('unregister-form').submit();" class="btn btn-outline-danger mb-3">Se désinscrire</a>
        @else
            <form id="register-form" action="{{ route('events.register', $event) }}" method="POST">
                @csrf
            </form>
            <a href="{{ route('events.register', $event) }}" onclick="event.preventDefault(); document.getElementById('register-form').submit();" class="btn btn-outline-success m-4">S'inscrire</a>
        @endif
    @endauth

    @if (Auth::check() && Auth::user()->is_admin)
        <a href="{{ route('events.admin.register', $event->id) }}" class="btn btn-outline-primary mb-3">Inscrire des joueurs</a>
        <a href="{{ route('events.downloadRegistrations', $event->id) }}" class="btn btn-outline-secondary mb-3">Récupérer les inscrits</a>
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
                    <td> @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="50">
                        @else
                            <img src="{{ asset('storage/avatars/default-avatar.jpg') }}" alt="Avatar" width="50">
                        @endif</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->golf_index }}</td>
                </tr>
            @empty
                <tr><td colspan="3">Aucun joueur inscrit.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>



@include('footer')