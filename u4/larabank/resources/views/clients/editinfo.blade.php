@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Edit Client Info</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('clients-updateinfo', $client)}}" method="post">
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
                            <input type="text" class="form-control" name="accNumb" value="{{ old('accNumb', $client->accNumb) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Personal ID number</label>
                            <input type="text" class="form-control" name="personId" value="{{ old('personId', $client->personId) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Town</label>
                            <select class="form-select" name="town_id">
                                <option value="0">Towns List</option>
                                @foreach ($towns as $town)
                                <option value="{{$town->id}}" @if($town->id == $client->town_id) selected @endif>
                                        {{ $town->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text">Please select town</div>
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