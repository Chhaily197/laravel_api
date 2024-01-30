<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Form.css' )}}">
    <title>REGISTER</title>
</head>
<body>
    <div class="container">
        <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
        <h1>REGISTER</h1>
            <div class="g-profile">
                <label for="profile_image">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image">
                <img id="pro_img" alt="">
            </div>
            <div class="g-form">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
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
    <script src="{{ asset('js/Form.js')}}"></script>
</body>
</html>