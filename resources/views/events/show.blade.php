@include('header')



<div class="container">
        <h1>{{ $event->name }}</h1>
        <p><strong>Catégorie :</strong> {{ $event->category }}</p>
        <p><strong>Date :</strong> {{ $event->date_event }}</p>
        <p><strong>Places disponibles :</strong> {{ $event->places_available }}</p>
        <p><strong>Description :</strong> {{ $event->description }}</p>
        <p><strong>Image :</strong></p>
        <img src="{{ asset('storage/images/' . $event->image) }}" width="300">

        <a href="{{ route('welcome') }}" class="btn btn-primary">Retour à la liste des événements</a>
    </div>



@include('footer')