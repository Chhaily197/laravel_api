@extends('auth::layouts.master')

@section('content')
    <div class="profile_container">
        <h2>Your Profile</h2>
        <p>Name: {{ $user->username }}</p>
        <p>Name: {{ $user->email }}</p>
    </div>
@endsection