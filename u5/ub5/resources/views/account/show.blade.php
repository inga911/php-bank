@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title"><b>{{ $client->name}} {{ $client->surname}} </b> accounts:</h4>
                </div>
                <div class="info-table">
                    <div class="card-body-show">
                        <div>
                            @if ($accounts->count() > 0)
                                <ul>
                                    @foreach ($accounts as $account)
                                        <li>{{ $account->account }} saskaitoje yra: xxx EUR</li>
                                    @endforeach
                                </ul>
                            @else
                                No bank account numbers associated with this client.
                            @endif
                        </div>                   
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection