@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5 create-bg-dark">
                    <div class="card-header">
                        <h4 class="title">Create Account number</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('account-store')}}" method="post">
                            
                            <div class="mb-3">
                                <label class="form-label">Client</label>
                                <select class="form-select" name="client_id">
                                    <option value="0">Clients List</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"> 
                                            {{ $client->name }} {{ $client->surname }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">Please select client</div>
                            </div>
                            <button type="submit" class="create-btn">Generate</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection