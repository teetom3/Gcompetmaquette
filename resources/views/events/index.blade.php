@include('header')
<h1>Liste des événements</h1>


@if(session('succes'))
    <div style="color: green;">
{{sessions('success')}}
@endif
    </div>



    <a href="{{ route('events.create') }}">Créer un nouvel événement</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Date</th>
                <th>Description</th>
                <th>Places disponibles</th>
                <th>Image</th>
                <th>Actif</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->category }}</td>
                    <td>{{ $event->date_event }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->places_available }}</td>
                    <td><img src="{{ asset('storage/' . $event->image) }}" width="100"></td>
                    <td>{{ $event->is_active ? 'Oui' : 'Non' }}</td>
                    <td><a href="{{route('events.edit', $event->id)}}"><button>Modifier</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@include('footer')