@extends('layouts.app')

@section('content')
    <div style="background-color: inherit" class="jumbotron text-center">
        <h1>Welcome To Wishlist-19!</h1>
        <p>This is the laravel application made for the "Hack at Home" hackathon</p>
        <p>Create an account and tell us what your plans are after COVID-19. We will then generate recommendations for you as soon as options are available!</p>
        <div class="panels">
        <p><a class="btn btn-success" href="/test">Make a plan!</a></p>
        {{-- <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>--}}
        {{-- <p>or check out what others are wishing for! </p><a class="btn btn-default btn-lg" href="/other" role="button"><i class="fas fa-arrow-right"></i></a> --}}
        </div>
    </div>
@endsection