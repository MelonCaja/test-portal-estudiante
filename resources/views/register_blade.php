<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div>
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

</body>
</html>