@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5 create-bg-dark">
                    <div class="card-header">
                        <h4 class="title">Create Account</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('clients-store')}}" method="post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Surname</label>
                                <input type="text" class="form-control" name="surname" value="{{old('surname')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Personal ID number</label>
                                <input type="text" class="form-control" name="personId"  value="{{old('personId')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">*Bank Account Number will be generated automatically.</label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Town</label>
                                <select class="form-select" name="town_id">
                                    <option value="0">Towns List</option>
                                    @foreach ($towns as $town)
                                        <option value="{{ $town->id }}"> 
                                            {{ $town->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">Please select town</div>
                            </div>
                            <button type="submit" class="create-btn">Submit</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection