@extends('layouts.app')

@section('content')
    <div style="background-color: inherit" class="jumbotron text-center">
        <h1>Where do you wish to travel when the pandemic ends?</h1>
        <br>
        <input type="search" id="item" name="item" size="40" placeholder="Type your wish here">
        <button type="submit">Add to wish list</button>
    </div>
@endsection
