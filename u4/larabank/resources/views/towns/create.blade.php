@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5 create-bg-dark">
                    <div class="card-header">
                        <h4 class="title">Create Town</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('towns-store')}}" method="post">
                            <div class="mb-3">
                                <label class="form-label">Town Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
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