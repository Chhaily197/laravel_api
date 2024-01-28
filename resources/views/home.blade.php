<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1 style="font-size: 100px; text-align: center;">Home</h1>
    <form action="/logout" method="POST">
        @csrf
        @method('POST')
        <button type="submit">LOG OUT</button>
    </form>
</body>
</html>