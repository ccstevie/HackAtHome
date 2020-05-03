@extends('layouts.app')

@section('content')
    <div style="background-color: inherit" class="jumbotron text-center">
        <h1>My WishList</h1>
        <div class="flt-body2"><span>You will be automatically notified of availibities once COVID-19 is over!</span></div>
        <br>
        <div class="flights">
          <div id="myDIV" class="header">
              <h2>Flights</h2>
            </div>
            
            <ul class="myUL">
              @foreach($wishes as $wish)
                  <li>{{$wish->start}} to {{$wish->end}}</li>
              @endforeach
            </ul>
        </div>
        <div class="concerts">
        </div>
        <div class="food">
        </div>
    </div>
@endsection
