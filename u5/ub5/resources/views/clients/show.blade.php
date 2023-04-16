@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Client information</h4>
                </div>
                <div class="info-table">
                    <div class="card-body-show">
                        <div><b>Name: </b>{{ $client->name }}</div>
                        <div><b>Surname: </b>{{ $client->surname }}</div>
                        {{-- <div><b>Account number: </b>{{ $accountNumber }}</div> --}}
                        <div><b>Personal ID: </b>{{ $client->persId }}</div>
                        {{-- <div><b>Balance: </b>{{ $client->balance }} eur</div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection