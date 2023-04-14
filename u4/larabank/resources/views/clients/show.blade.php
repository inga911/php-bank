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
                        <div><b>Account number: </b>{{ $client->accNumb }}</div>
                        <div><b>Personal ID: </b>{{ $client->personId }}</div>
                        <div><b>Balance: </b>{{ $client->balance }} eur</div>
                    </div>
                    <div class="show-buttons">
                        <a href="{{ route('clients-editminus', $client)}}" class="btn btn-deduct">Deduct Funds</a>
                        <a href="{{ route('clients-editinfo', $client)}}" class="btn btn-show">Edit Info</a>
                        <a href="{{ route('clients-editadd', $client)}}" class="btn btn-add">Add Funds</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mt-5">
                <div class="list-btn">
                    <a href="{{route('orders-create', ['id' => $client])}}" class="btn btn-show">+ New order</a>
                </div>
                    <div class="head-info-list">
                        <div>Client</div>
                        <div>The item</div>
                        <div>Price</div>
                        
                    </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @forelse($client->order as $order)
                                <tr class="list">
                                    {{-- <div class="client-order"></div> --}}
                                        <td><a href="{{route('orders-show', $order)}}" class="client">{{ $order->orderClient->name }} {{ $order->orderClient->surname }}</a></td>
                                        <td>{{ $order->title }}</td>
                                        <td>{{ $order->price }}</td>
                                    {{-- </div> --}}
                                  
                                </tr>
                            @empty
                                <div class=" mt-4">
                                    <div class="order-line">No orders yet</div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection