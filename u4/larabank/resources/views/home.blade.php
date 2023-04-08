@extends('layouts.app')

@section('content')

{{-- <div class="container" >
    <div class="row justify-content-center"> --}}
        {{-- <div class="col-md-8"> --}}
           
                <h1>Welcome,  {{ Auth::user()->name }}!</h1>
                {{-- <h4>Total clients: {{ route('home', $totalClients)}}</h4> --}}

                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div>You are logged in!</div>
                </div>
                <img src="{{  asset('images/bank.jpg')}}" alt="bank">
            
        {{-- </div> --}}
    {{-- </div>
</div> --}}

@endsection
