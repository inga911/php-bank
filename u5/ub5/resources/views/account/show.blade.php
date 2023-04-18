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
                                        <label for="amount">Add funds:</label>
                                        <input type="text" name="amount" id="amount" required>
                                        <button type="submit">Submit</button>
                                    </form>
                                                                    
                                    <form action="{{ route('account-updateDeduct', ['client' => $client->id, 'account' => $account->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="amount">Deduct funds:</label>
                                        <input type="text" name="amount" id="amount" required>
                                        <button type="submit">Submit</button>
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

@endsection