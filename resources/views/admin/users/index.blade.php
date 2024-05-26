<!DOCTYPE html>
<html>
<head>
    <title>Admin - Utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }} {{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
