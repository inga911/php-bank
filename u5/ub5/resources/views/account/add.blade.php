@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title"><b>{{ $client->name}} {{ $client->surname}} </b></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('account-updateAdd', [$client, $account]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Account: {{ $account->account }}</label>
                            <label class="form-label">Enter an amount you want to add</label>
                            <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" required>
                            <span>Remaining funds: {{ number_format($client->balance, 2) }} eur</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Add funds</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection