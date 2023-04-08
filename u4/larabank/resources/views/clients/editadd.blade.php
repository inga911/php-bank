{{-- @extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Add Funds</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('clients-update', $client)}}" method="post">
                        <div><b>Name: </b>{{ $client->name }}</div>
                        <div><b>Surname: </b>{{ $client->surname }}</div>
                        <div class="mb-3">
                            <label class="form-label">Enter an amount you want to add</label>
                            <input type="text" class="form-control" name="balance">
                            <input type="hidden" name="edit_type" value="add">
                            <span style="color: grey; font-size: 12px">Remaining funds: {{ $client->balance }} eur</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-add">Confirm</button>
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
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
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $client->name) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control" name="surname" value="{{ old('surname', $client->surname) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Account number</label>
                            <input type="text" class="form-control" name="accNumb" value="{{ old('accNumb', $client->accNumb) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Personal ID number</label>
                            <input type="text" class="form-control" name="personId" value="{{ old('personId', $client->personId) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter an amount you want to add</label>
                            <input type="text" class="form-control" name="balance" >
                            <input type="hidden" name="balace" value="{{ $client->balance }}">
                            <span style="color: grey; font-size: 12px">Remaining funds: {{ $client->balance }} eur</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-show">Confirm</button>
                    @csrf
                    @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection