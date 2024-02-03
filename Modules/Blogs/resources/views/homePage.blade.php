@extends('blogs::layouts.master')

@section('content')
<div class="container">
        <video loop autoplay muted>
                <source src="{{ asset('assets/videos/ocean.mp4')}}"  type="video/mp4"/>
        </video>
        <video>
                <source src="{{ asset('assets/videos/Sea.mp4')}}"  type="video/mp4"/>
        </video>
        <h1>WELCOME</h1>
</div>
@endsection