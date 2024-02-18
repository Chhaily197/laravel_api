@extends('blogs::layouts.master')

@section('content')
<div class="container">
        <video loop autoplay muted>
                <source src="{{ asset('assets/videos/ocean.mp4')}}"  type="video/mp4"/>
        </video>
        <video>
                <source src="{{ asset('assets/videos/Sea.mp4')}}"  type="video/mp4"/>
        </video>
        <h1>Why it update?</h1>
        <p>I had unable global git</p>
</div>
@endsection