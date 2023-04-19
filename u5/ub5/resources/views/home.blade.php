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
                    <div>
                        <p>Total clients: {{$totalClients}} </p>
                        <p>Total accounts: {{$totalAccounts}} </p>
                        <p>Total amount in the bank: {{$totalAmount}} eur</p>
                        <p>The richest client: {{$richestClient->name}} {{$richestClient->surname}} ({{$richestClient->accounts->sum('balance')}} eur)</p>
                        <p> Average accounts amount: {{ number_format($averageAmount, 2)}} eur</p>
                        <p> Number of accounts with 0 balances: {{$accountsZero}}</p>
                        <p> Number of accounts with a negative balance: {{$accountsNegative}}</p>
                    </div>
                </div>
        </div>
</div> 

@endsection
