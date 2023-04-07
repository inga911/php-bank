@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="show-title">Client information</h4>
                </div>
                <div class="card-body-show">
                            <div><b>Name: </b>{{ $client->name }}</div>
                            <div><b>Surname: </b>{{ $client->surname }}</div>
                            {{-- <div><b>Account number: </b>{{ $client->accNumber }}</div>
                            <div><b>Personal ID: </b>{{ $client->persId }}</div>
                            <div><b>Balance: </b>{{ $client->balance }} eur</div> --}}
                </div>
                <div class="show-buttons">
                    <a href="{{ route('clients-editminus', $client)}}" class="btn btn-warning btn-deduct">Deduct Funds</a>
                    <a href="{{ route('clients-editadd', $client)}}" class="btn btn-success btn-add">Add Funds</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection