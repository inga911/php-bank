@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="show-title">Create Account</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('clients-store')}}" method="post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                                <div class="form-text">The name must consist of at least 3 letters and cannot contain any of the following characters: \ / : * ? < > | + - </div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Surname</label>
                                <input type="text" class="form-control" name="surname">
                                <div class="form-text">The surname must consist of at least 3 letters and cannot contain any of the following characters: \ / : * ? < > | + - </div>

                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Personal ID number</label>
                                <input type="text" class="form-control" name="personId">
                                <div class="form-text">Personal ID number must contain 11 numbers</div>

                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label">*Bank Account Number will be generated automatically.</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection