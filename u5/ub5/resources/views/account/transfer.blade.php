@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Transfer money</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('account-store')}}" method="post">         
                        <div class="mb-3">
                            <label class="form-label">From</label>
                            <select class="form-select" name="client_id">
                                <option value="0">Choose client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"> 
                                        {{ $client->name }} {{ $client->surname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <button type="submit" class="create-btn">Generate</button> --}}
                        @csrf
                    </form>
                    <form action="{{route('account-store')}}" method="post">         
                        <div class="mb-3">
                            <label class="form-label">To</label>
                            <select class="form-select" name="client_id">
                                <option value="0">Choose client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"> 
                                        {{ $client->name }} {{ $client->surname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <button type="submit" class="create-btn">Generate</button> --}}
                        @csrf
                    </form>
                    <form action="{{route('account-add', $client)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="text" class="form-control" name="balance" >
                            <input type="hidden" name="balance" value="{{ $client->balance }}">
                            <span>Remaining funds: {{ number_format($client->balance, 2) }} eur</span>
                        </div>
                        <div>
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" >
                        </div>
                        <button type="submit" class="btn btn-add">Confirm </button>
                    @csrf
                    @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection