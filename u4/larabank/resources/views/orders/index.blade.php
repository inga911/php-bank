@extends('layouts.app')

@section('content')
<h2 class="main-title">Orders List</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mt-5">
                    <div class="head-info-list">
                        <div>Client</div>
                        <div>The item</div>
                        <div>Price</div>
                    </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @forelse($orders as $order)
                                <tr class="list">
                                    {{-- <div class="client-order"></div> --}}
                                        <td><a href="{{route('orders-show', $order)}}" class="client">{{ $order->orderClient->name }} {{ $order->orderClient->surname }}</a></td>
                                        <td>{{ $order->title }}</td>
                                        <td>{{ $order->price }}</td>
                                    {{-- </div> --}}
                                    <td class="list-btn">
                                        <a href="{{ route('orders-show', $order) }}" class="btn btn-show">Show</a>
                                        <form action="{{ route('orders-delete', $order) }}" method="post" style="display: inline-block;">
                                            <button type="submit" class="btn btn-del">Delete</button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
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