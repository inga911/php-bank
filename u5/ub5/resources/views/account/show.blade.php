@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Client information</h4>
                </div>
                <div class="info-table">
                    <div class="card-body-show">
                        <div><b>Name: </b>{{ $client->name}}</div>
                        <div><b>Surname: </b>{{ $client->surname}}</div>
                        <div>
                            <b>Account numbers:</b> 
                            @if ($accounts->count() > 0)
                                <ul>
                                    @foreach ($accounts as $account)
                                        <li>{{ $account->accountNumber }}</li>
                                    @endforeach
                                </ul>
                            @else
                                No bank account numbers associated with this client.
                            @endif
                        </div>                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection