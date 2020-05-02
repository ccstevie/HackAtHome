@extends('layouts.app')

@section('content')
    <div style="background-color: inherit" class="jumbotron text-center">
        <h1>I wish to...</h1><br>
        <div display="flex" class="row panels">
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-body square">
                        <a href="/travel">
                            Travel
                            <i class="fas fa-plane"></i>
                        </a>
                    </div>
                  </div>
            </div>
            <div class="col-sm-4">
                  <div class="panel panel-default">
                    <div class="panel-body square">
                        <a href="#">
                            Attend a concert (coming soon)
                            <i class="fas fa-music"></i>
                        </a>
                    </div>
                  </div>
            </div>
            <div class="col-sm-4">
                  <div class="panel panel-default">
                    <div class="panel-body square">
                        <a href="#">
                            EAT (coming soon)
                            <i class="fas fa-hamburger"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
