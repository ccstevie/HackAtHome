@extends('layouts.app')

@section('content')
<div style="background-color: inherit" class="jumbotron text-center">
    <h1>Choose your travel location!</h1>
    <div jstcache="2919" class="P1WQH gws-flights__flex-box"><img src="//www.gstatic.com/flights/app/advisory-medium.svg" class="gws-flights__flex-rigid" height="44px" width="44px" alt="" style="margin-right: 24px;"><div class="gws-flights__flex-filler" jscontroller="wSIxM" jsaction="rcuQ6b:npT2md"><div class="jAEhX flt-headline6">Active travel advisory</div><div class="flt-body2"><span>There's a government travel advisory related to coronavirus (COVID-19).</span>&nbsp;<a href="https://travel.gc.ca/travelling/advisories" jsname="YbvMmd" class="bPvukf" data-flt-ve="covid_advisory_more_details" data-url="https://travel.gc.ca/travelling/advisories" jsaction="jsa.popup" target="_blank">More details</a></div></div></div>
        <br>
        {!! Form::open(array('route' => 'travel_results', 'method' => 'GET')) !!}
            <div class="square">
                <div class="row">
                    <div class="col-sm-5">
                        <label for="">Start Location</label>
                        <input type="search" id="start" name="start" size="40" placeholder="Type your location here">
                    </div>
                    <div class="col-sm-5">
                        <label for="">End Location</label>
                        <input type="search" id="end" name="end" size="40" placeholder="Type your location here">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection