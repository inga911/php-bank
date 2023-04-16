@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Edit Client Info</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('clients-update', $client)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $client->name) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control" name="surname" value="{{ old('surname', $client->surname) }}">
                        </div>
                        <button type="submit" class="bt btn-show">Confirm</button>
                    @csrf
                    @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection