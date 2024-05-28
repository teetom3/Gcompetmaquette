@include('header')
    <h1>Modifier un événement</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" value="{{ $event->name }}" required><br><br>

        <label for="category">Catégorie:</label>
        <input type="text" id="category" name="category" value="{{ $event->category }}" required><br><br>

        <label for="date_event">Date de l'événement:</label>
        <input type="date" id="date_event" name="date_event" value="{{ $event->date_event }}" required><br><br>

        <label for="places_available">Places disponibles:</label>
        <input type="number" id="places_available" name="places_available" value="{{ $event->places_available }}" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $event->description }}</textarea><br><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image"><br><br>

        <label for="is_active">Actif:</label>
        <input type="checkbox" id="is_active" name="is_active" value="1" {{ $event->is_active ? 'checked' : '' }}><br><br>

        <button type="submit">Modifier</button>
    </form>
@include('footer')
