
@include('header')
<div class="container">
    <h1>Modifier Utilisateur</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Prénom:</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', $user->surname) }}" required>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date de naissance:</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>


        <div class="mb-3">
        <label for="license_number" class="form-label">Numéro de licence:</label>
        <input type="text" id="license_number" name="license_number" class="form-control" value="{{ old('license_number', $user->license_number) }}" required>
    </div>

    <div class="mb-3">
        <label for="golf_index" class="form-label">Index Golf:</label>
        <input type="text" id="golf_index" name="golf_index" class="form-control" value="{{ old('golf_index', $user->golf_index) }}" required>
    </div>
        <!-- Ajouter d'autres champs de formulaire ici -->

        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar:</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Supprimer</button>
    </form>
</div>

@include('footer')
