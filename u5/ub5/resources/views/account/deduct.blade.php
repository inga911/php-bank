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
                    <form action="{{ route('account-updateDeduct', [$client, $account]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <p>Account: {{ $account->account }}</p>
                            <label class="form-label">Enter an amount you want to deduct</label>
                            <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" required>
                            <span>Remaining funds: {{ $account->balance }} eur</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Deduct funds</button>
                    </form>
                    <a href="{{route('account-show', $client)}}">Go back to {{$client->name}} account list</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection