@extends('blogs::layouts.master')

@section('content')
<div class="container">
        <video loop autoplay muted>
                <source src="{{ asset('assets/videos/ocean.mp4')}}"  type="video/mp4"/>
        </video>
        <video>
                <source src="{{ asset('assets/videos/Sea.mp4')}}"  type="video/mp4"/>
        </video>
        <h1>WELCOME HERE</h1>
        <p>This is code update in the branch users, can you see</p>
        <p>This is code update on time 4:54 pm</p>
</div>
@endsection