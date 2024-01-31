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
        <a href="{{ route('profile') }}">My Profile</a>
        @if ($user->photo)
           <img
            onerror="this.src=`https://www.istockphoto.com/photo/paper-speech-bubble-with-the-word-oops-on-a-yellow-background-top-view-with-copy-gm1481191904-508568620?utm_source=pixabay&utm_medium=affiliate&utm_campaign=SRP_image_sponsored&utm_content=https%3A%2F%2Fpixabay.com%2Fimages%2Fsearch%2Ferror%2F&utm_term=error`"
            src="{{ asset('/storage/'.$user->photo) }}" alt="Profile_image">           
        @else
            <p>No profile image available</p>
        @endif
    <form action="/logout" method="POST">
        @csrf
        @method('POST')
        <button type="submit">LOG OUT</button>
    </form>
</body>
</html>