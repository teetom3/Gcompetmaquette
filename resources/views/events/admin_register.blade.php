
@include('header')

<div class="container">

<h1>Inscrire des joueurs à {{ $event->name }}</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('events.admin.registerPlayers', $event->id) }}" method="POST">
        @csrf
        <label for="user_id">Sélectionner un joueur</label>
        <select name="user_id" id="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
            @endforeach
        </select>
        <button type="submit">Inscrire</button>
    </form>

    <h2>Joueurs inscrits</h2>
    <ul>
        @foreach ($event->users as $user)
            <li>
                {{ $user->name }} {{ $user->surname }}
                <form action="{{ route('events.admin.unregisterPlayer', [$event->id, $user->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Désinscrire</button>
                </form>
            </li>
        @endforeach
    </ul>


</div>
@include('footer')


