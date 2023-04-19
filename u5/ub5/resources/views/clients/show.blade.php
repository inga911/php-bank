@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Client information</h4>
                </div>
                <div class="info-table">
                    <div class="card-body-show">
                        <div><b>Name: </b>{{ $client->name }}</div>
                        <div><b>Surname: </b>{{ $client->surname }}</div>
                        <div><b>Personal ID: </b>{{ $client->persId }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{route('clients-index')}}">Go back to clients list</a>


@endsection