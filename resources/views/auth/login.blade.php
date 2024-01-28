<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <form action="/login" method="POST">
            @csrf
            @method('POST')
            <div class="g-form">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="g-form">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>