<div id="app">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->birthday->format('d/m/Y') }}</td>
            <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
            <td>
                <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

<script src="{{ mix('js/app.js') }}"></script>
