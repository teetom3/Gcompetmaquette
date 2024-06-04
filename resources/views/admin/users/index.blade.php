@include('header')

    <h2 class="fw-normal">Liste des utilisateurs</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="container">
    <table class="table">
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
                        <a href="{{ route('admin.users.edit', $user) }}"><button>Modifier</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('footer')
