@extends('layouts.app')

@section('content')

<div class="container" >
        <div class="col-md-12">
           
                <h1 class="welcome-title">Welcome,  {{ Auth::user()->name }}!</h1>

                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p class="">You are logged in!</p>

                </div>
                <div class="analytic">
                    {{-- <img src="{{  asset('images/analytics.svg')}}" alt="bank"> --}}
                    <div>
                        {{-- <h3>At the moment, we have <span>{{ $totalClients }}</span> clients in the bank.</h3>
                        <h4>The total amount of money in the bank is: <span>{{ $totalBalance }} </span> (eur).</h4> --}}
                    </div>
                </div>
        </div>
</div> 

@endsection
