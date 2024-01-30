<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div class="profile_container">
        <h2>Your Profile</h2>
        <p>Name: {{ $user->username }}</p>
        <p>Name: {{ $user->email }}</p>
    </div>
</body>
</html>