@include('header')

<div class="container">
    <form action="{{ route('events.destroy', $event) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">Supprimer l'événement</button>
    </form>

    <h2 class="fw-normal">Modifier un événement</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Catégorie:</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ $event->category }}" required>
        </div>

        <div class="mb-3">
            <label for="date_event" class="form-label">Date de l'événement:</label>
            <input type="date" class="form-control" id="date_event" name="date_event" value="{{ $event->date_event }}" required>
        </div>

        <div class="mb-3">
            <label for="places_available" class="form-label">Places disponibles:</label>
            <input type="number" class="form-control" id="places_available" name="places_available" value="{{ $event->places_available }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $event->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Actif</label>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>

@include('footer')
