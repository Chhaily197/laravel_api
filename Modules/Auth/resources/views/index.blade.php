@extends('auth::layouts.master')

@section('content')
     <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @method('POST')
            <h1>LOGIN FORM</h1>
            <div class="group-form mb-2">
                <input class="form-control" type="email" name="email" required>
            </div>
            <div class="g-form mb-2">
                <input class="form-control" type="password" name="password" required>
            </div>
            <button class="btn btn-primary" type="submit">LOGIN</button>
            <a class="btn btn-primary" href="{{ route('register') }}">Registers</a>
        </form>
    </div>
@endsection
