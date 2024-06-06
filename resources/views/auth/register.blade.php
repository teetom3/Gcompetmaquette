
<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="text-center mb-4">
        <img src="{{ asset('images/Logo.jpg') }}" alt="Logo" class="mb-3">
        <h1>Inscription</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="surname">Prénom:</label>
            <input type="text" id="surname" name="surname" value="{{ old('surname') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date de naissance:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Téléphone:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Adresse:</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="license_number">Numéro de licence:</label>
            <input type="text" id="license_number" name="license_number" value="{{ old('license_number') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="golf_index">Index Golf:</label>
            <input type="text" id="golf_index" name="golf_index" value="{{ old('golf_index') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmer le Mot de passe:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar" class="form-control-file">
        </div>

        <div class="form-group form-check m-2">
            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
            <label class="form-check-label" for="terms">
                J'accepte les <a href="{{ route('terms') }}" target="_blank">conditions générales d'utilisation</a>
            </label>
        </div>

        <button type="submit" class="btn btn-success mt-2">S'inscrire</button>
    </form>
</div>

<a href="{{route('login')}}"><button class="btn btn-success m-4">Retour à la page de Connexion</button></a>
</body>
</html>