@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Town information</h4>
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
                        <a href="{{ route('towns-editminus', $client)}}" class="btn btn-deduct">Deduct Funds</a>
                        <a href="{{ route('towns-editinfo', $client)}}" class="btn btn-show">Edit Info</a>
                        <a href="{{ route('towns-editadd', $client)}}" class="btn btn-add">Add Funds</a>
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
                    {{-- <a href="{{ route('orders-edit', $client->order) }}" class="btn btn-show">Edit order</a> --}}
                    <div class="buttons">
                        <form action="" method="post">
                            <button type="submit" class="btn btn-del">Delete</button>
                        @csrf
                        @method('delete')
                        </form>
                    </div>
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
                                <td>
                                    <a href="{{route('orders-show', $order)}}" class="client">{{ $order->orderClient->name }} {{ $order->orderClient->surname }}</a>
                                </td>
                                <td>{{ $order->title }}</td>
                                <td>{{ $order->price }}</td>
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