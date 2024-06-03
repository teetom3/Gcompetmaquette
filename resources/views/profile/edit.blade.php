@include('header')
<h1 class="mb-4">Mon Profil</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mb-5">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nom:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Prénom:</label>
        <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname', $user->surname) }}" required>
    </div>

    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date de naissance:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->date_of_birth) }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Téléphone:</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Adresse:</label>
        <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $user->address) }}" required>
    </div>

    <div class="mb-3">
        <label for="license_number" class="form-label">Numéro de licence:</label>
        <input type="text" id="license_number" name="license_number" class="form-control" value="{{ old('license_number', $user->license_number) }}" required>
    </div>

    <div class="mb-3">
        <label for="golf_index" class="form-label">Index Golf:</label>
        <input type="text" id="golf_index" name="golf_index" class="form-control" value="{{ old('golf_index', $user->golf_index) }}" required>
    </div>

    <div class="mb-3">
        <label for="avatar" class="form-label">Avatar:</label>
        <input type="file" id="avatar" name="avatar" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>

<h2 class="mb-4">Changer le mot de passe</h2>
<form method="POST" action="{{ route('profile.updatePassword') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="current_password" class="form-label">Mot de passe actuel:</label>
        <input type="password" id="current_password" name="current_password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Nouveau mot de passe:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmer le mot de passe:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
</form>
@include('footer')
