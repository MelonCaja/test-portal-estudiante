<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <h1>Logout</h1>
    <form method="POST" action="/logout">
        {{ csrf_field() }}
        <div>
            <button type="submit">Logout</button>
        </div>
    </form>
</body>
</html>
