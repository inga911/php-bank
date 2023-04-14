@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5 create-bg-dark">
                    <div class="card-header">
                        <h4 class="title">Edit Order</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('orders-update', $order)}}" method="post">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $order->title) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" value="{{ old('price', $order->price) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Client</label>
                                <select class="form-select" disabled>
                                    <option>{{ $order->orderClient->name }} {{ $order->orderClient->name }}</option>                               </option>
                                </select>
                                <div class="form-text">Orders client</div>
                            </div>
                            <button type="submit" class="create-btn">Add</button>
                            @csrf
                            @method('put')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection