@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Add Funds</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('clients-updateadd', $client)}}" method="post">
                        <div class="names">
                            <div><b>Name: </b>{{ $client->name }}</div>
                            <div><b>Surname: </b>{{ $client->surname }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter an amount you want to add</label>
                            <input type="text" class="form-control" name="balance" >
                            <input type="hidden" name="balace" value="{{ $client->balance }}">
                            <span>Remaining funds: {{ $client->balance }} eur</span>
                        </div>
                        <button type="submit" class="btn btn-add">Confirm</button>
                    @csrf
                    @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection