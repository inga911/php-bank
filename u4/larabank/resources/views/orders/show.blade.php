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
                        <div><b>Name: </b>{{ $order->orderClient->name}}</div>
                        <div><b>Surname: </b>{{ $order->orderClient->surname}}</div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection