@include('header')

    <h2 class="fw-normal">Liste des utilisateurs</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="container">
    <!-- Champ de recherche -->
    <input type="text" id="search" placeholder="Rechercher un joueur...">

    <!-- Curseurs pour l'index de golf -->
    <div>
        <label for="minIndex">Index de golf min :</label>
        <input type="range" id="minIndex" min="0" max="54" value="0">
        <span id="minIndexValue">0</span>
    </div>

    <div>
        <label for="maxIndex">Index de golf max :</label>
        <input type="range" id="maxIndex" min="0" max="54" value="54">
        <span id="maxIndexValue">54</span>
    </div>


<div class="container">
    <table class="table" id="users-table">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function searchPlayers() {
            var query = $('#search').val();
            var minIndex = $('#minIndex').val();
            var maxIndex = $('#maxIndex').val();

            $.ajax({
                url: "{{ route('admin.users.search') }}",
                type: "GET",
                data: {
                    'query': query,
                    'minIndex': minIndex,
                    'maxIndex': maxIndex
                },
                success: function(data) {
                    $('#users-table tbody').html('');

                    if (data.length > 0) {
                        data.forEach(user => {
                            $('#users-table tbody').append(`
                                <tr>
                                    <td>${user.name} ${user.surname}</td>
                                    <td>${user.email}</td>
                                    <td>
                                        <a href="{{ url('/admin/users/edit') }}/${user.id}"><button>Modifier</button></a>
                                    </td>
                                </tr>
                            `);
                        });
                    } else {
                        $('#users-table tbody').append('<tr><td colspan="3">Aucun utilisateur trouvé</td></tr>');
                    }
                }
            });
        }

        $('#search').on('keyup', searchPlayers);
        $('#minIndex, #maxIndex').on('change', function() {
            $('#minIndexValue').text($('#minIndex').val());
            $('#maxIndexValue').text($('#maxIndex').val());
            searchPlayers();
        });
    });
</script>
@include('footer')
