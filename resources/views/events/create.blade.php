@include('header')

    <h1>Créer un événement</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="category">Catégorie:</label>
        <input type="text" id="category" name="category" required><br><br>

        <label for="date_event">Date de l'événement:</label>
        <input type="date" id="date_event" name="date_event" required><br><br>

        <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>
        
        <label for="places_available">Places disponibles:</label>
        <input type="number" id="places_available" name="places_available" required><br><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image"><br><br>

        <label for="is_active">Actif:</label>
        <input type="checkbox" id="is_active" name="is_active" value="1" checked><br><br>

        <button type="submit">Créer</button>
    </form>
@include('footer')

