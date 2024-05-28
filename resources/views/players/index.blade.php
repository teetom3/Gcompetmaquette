@include('header')

<div class="container">
    <h1>Liste des Joueurs</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Index</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>
                        @if($player->avatar)
                            <img src="{{ asset('storage/avatars/' . $player->avatar) }}" alt="Avatar" width="50">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" width="50">
                        @endif
                    </td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->surname }}</td>
                    <td>{{ $player->golf_index }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




@include('footer')