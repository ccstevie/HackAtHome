@extends('layouts.app')

@section('content')
<div style="background-color: inherit" class="jumbotron text-center">
    <h1>Choose your travel location!</h1>
    <div class="flt-body2"><span>There's a government travel advisory related to coronavirus (COVID-19).</span>&nbsp;<a href="https://travel.gc.ca/travelling/advisories" jsname="YbvMmd" class="bPvukf" data-flt-ve="covid_advisory_more_details" data-url="https://travel.gc.ca/travelling/advisories" jsaction="jsa.popup" target="_blank">More details</a></div>
    <br>
        {!! Form::open(array('route' => 'travel_results', 'method' => 'GET')) !!}
            <div class="square">
                <div class="row">
                    <div class="col-sm-5">
                        <label class="form-group required" for="">Start Location</label>&nbsp;
                        <input type="search" class="rounded" id="country1" name="country1" size="40" placeholder="Country" required="">
                    </div>
                    <div class="col-sm-5">
                        <input type="search"class="rounded" id="city1" name="city1" size="40" placeholder="City" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <label class="form-group required" for="">&nbsp;End Location</label>&nbsp;
                        <input type="search" class="rounded" id="country2" name="country2" size="40" placeholder="Country" required="">
                    </div>
                    <div class="col-sm-5">
                        <input type="search" class="rounded" id="city2" name="city2" size="40" placeholder="City" required="">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection