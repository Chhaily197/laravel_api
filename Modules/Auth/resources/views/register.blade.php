@extends('auth::layouts.master')
@section('content')
    <div class="container">
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
        <h1>REGISTER</h1>
            <div class="g-profile">
                <label for="profile_image">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image">
                <img id="pro_img" alt="">
            </div>
            <div class="group-form mb-2">
                <input class="form-control" type="text" name="username" required>
            </div>
            <div class="group-form mb-2">
                <input class="form-control" type="email" name="email" required>
            </div>
            <div class="group-form mb-2">
                <input class="form-control" type="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">REGISTER</button>
            <a class="btn btn-primary" href="{{ route('login') }}">LOGIN</a>
        </form>
    </div>
    <script src="{{ asset('js/Form.js')}}"></script>
@endsection