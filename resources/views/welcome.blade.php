@include('header')



<h2 class="m-5 fw-normal">Liste des événements</h2>
<div class="container">
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card event-card h-100 rounded">
                    <div class="card-body">
                        <h2 class="card-title">{{ $event->name }}</h2>
                        @if($event->image)
                        <img class="card-img-top" src="{{ asset('storage/' . $event->image) }}" style="width: 100%; ">
                        @else
                        <img class="card-img-top" src="{{ asset('storage/image/default-event.jpg') }}" style="width: 100%; ">
                        @endif
                        <p class="card-text">Date: {{ date('d-M-y', strtotime($event->date_event)) }}</p>
                        <p class="card-text">Catégorie: {{ $event->category }}</p>
                        <p class="card-text">Places disponibles: {{ $event->places_available }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>





@include('footer')