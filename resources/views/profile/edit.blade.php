@include('header')
    <h1>Mon Profil</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required><br><br>

        <label for="surname">Prénom:</label>
        <input type="text" id="surname" name="surname" value="{{ old('surname', $user->surname) }}" required><br><br>

        <label for="date_of_birth">Date de naissance:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required><br><br>

        <label for="phone">Téléphone:</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required><br><br>

        <label for="address">Adresse:</label>
        <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" required><br><br>

        <label for="license_number">Numéro de licence:</label>
        <input type="text" id="license_number" name="license_number" value="{{ old('license_number', $user->license_number) }}" required><br><br>

        <label for="golf_index">Index Golf:</label>
        <input type="text" id="golf_index" name="golf_index" value="{{ old('golf_index', $user->golf_index) }}" required><br><br>

        <label for="avatar">Avatar:</label>
        <input type="file" id="avatar" name="avatar"><br><br>

        <button type="submit">Mettre à jour</button>
    </form>

    <h2>Changer le mot de passe</h2>
    <form method="POST" action="{{ route('profile.updatePassword') }}">
        @csrf
        @method('PUT')

        <label for="current_password">Mot de passe actuel:</label>
        <input type="password" id="current_password" name="current_password" required><br><br>

        <label for="password">Nouveau mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="password_confirmation">Confirmer le mot de passe:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>

        <button type="submit">Changer le mot de passe</button>
    </form>
@include('footer')
