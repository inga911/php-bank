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
                                    <li>{{ $account->account }} current balance: {{ $account->balance }} EUR</li>
                                    <form action="{{ route('account-updateAdd', ['client' => $client->id, 'account' => $account->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <a href="{{ route('account-add', ['client' => $client->id, 'account' => $account->id]) }}">Add funds</a>
                                    </form>                         
                                    <form action="{{ route('account-updateDeduct', ['client' => $client->id, 'account' => $account->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <a href="{{ route('account-deduct', ['client' => $client->id, 'account' => $account->id]) }}">Deduct funds</a>
                                    </form>
                                    <form action="{{ route('account-delete', ['client' => $client->id, 'account' => $account->id]) }}" method="post">
                                        <button type="submit" class="btn btn-del">Delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                @endforeach
                            </ul>
                            @else
                               This clients does not have bank accounts yet.
                            @endif
                        </div>                   
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
<a href="{{route('clients-index')}}">Go back to clients list</a>

@endsection