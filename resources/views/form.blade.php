<div id="app">
<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <input type="date" name="birthday" required>
    <label>
        <input type="checkbox" name="status_active" value="1"> Active
    </label>
    <button type="submit">Submit</button>
    <a href="{{ route('user.index') }}">Go to Table Page</a>
</form>
</div>

<script src="{{ mix('js/app.js') }}"></script>
