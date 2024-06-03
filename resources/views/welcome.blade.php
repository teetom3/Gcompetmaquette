@include('header')



<h1>Liste des événements</h1>
<div class="container">
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card event-card h-100">
                    <div class="card-body">
                        <h2 class="card-title">{{ $event->name }}</h2>
                        <img class="card-img-top" src="{{ asset('storage/' . $event->image) }}" style="width: 200px ">
                        <p class="card-text">Date: {{ $event->date_event }}</p>
                        <p class="card-text">Catégorie: {{ $event->category }}</p>
                        <p class="card-text">Places disponibles: {{ $event->places_available }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>





@include('footer')