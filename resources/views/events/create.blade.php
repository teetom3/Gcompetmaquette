@include('header')

<div class="container">
    <h2 class="m-5 fw-normal">Créer un événement</h2>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom:</label>
            <input class="form-control" type="text" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="category">Catégorie:</label>
            <input class="form-control" type="text" id="category" name="category" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="date_event">Date de l'événement:</label>
            <input class="form-control" type="date" id="date_event" name="date_event" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="mb-3">
            <label for="places_available" class="form-label">Places disponibles:</label>
            <input class="form-control" type="number" id="places_available" name="places_available" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>

        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
            <label class="form-check-label" for="is_active">Actif</label>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>

@include('footer')

