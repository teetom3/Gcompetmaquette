@include('header')



<h1>Liste des événements</h1>
    <div class="events">
        @foreach ($events as $event)
            <div class="card">
                <h2>{{ $event->name }}</h2>
                <p>Date: {{ $event->date_event }}</p>
                <p>Catégorie: {{ $event->category }}</p>
                <p>Places disponibles: {{ $event->places_available }}</p>
                <a href="{{ route('events.show', $event->id) }}">En savoir plus</a>
            </div>
        @endforeach
    </div>


@include('footer')