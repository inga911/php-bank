@extends('layouts.app')

@section('content')

<div class="container" >
    {{-- <div class="row justify-content-center">  --}}
        <div class="col-md-12">
           
                <h1 class="welcome-title">Welcome,  {{ Auth::user()->name }}!</h1>

                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p class="">You are logged in!</p>
                   {{-- <div class="info">
                       <h4 class="info-title">Today in our bank we have: </h4>
                       <div class="data">
                           <h5 class="info-title-data">Clients: </h5>
                           <h5 class="info-title-data">Money form all clients: </h5>
                       </div>
                   </div> --}}
                </div>

                    <img src="{{  asset('images/success_factors.svg')}}" alt="bank">

        </div>
    {{-- </div> --}}
</div> 

@endsection
