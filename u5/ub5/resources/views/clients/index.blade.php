@extends('layouts.app')

@section('content')
<h2 class="main-title">Clients List</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <form action="{{ route('clients-index') }}">
                <div class="per-page">
                    <label class="form-label">Results per page</label>
                    <select class="col-3" name="per">
                        @foreach($perSelect as $value => $text)
                        <option value="{{$value}}" @if($value===$per) selected @endif>{{$text}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="sort-btn">OK</button>
                </div>
            </form>
            <div class="mt-4 pages">
                {{ $clients->links() }}
            </div>
            {{-- <form action="{{ route('clients-index') }}" method="get">
                <select name="sort">
                    @foreach ($sortSelect as $value => $text)
                        <option value="{{ $value }}" @if($value === $sort) selected @endif>{{ $text }}</option>
                    @endforeach
                </select>
                <button type="submit" class="sort-btn">OK</button>
            </form> --}}
            <div class="card mt-5">
                <table class="table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Surname</th>
                                <th scope="col">Name</th>
                                <th scope="col">Accounts</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clients as $client)
                            <tr>
                                <td>{{ $client->surname }}</td>
                                <td>{{ $client->name }}</td>
                                <td>Total balance: x eur</td>
                                <td><a href="{{ route('account-show', $client) }}" class="">Show acc</a></td>
                                <td><a href="{{ route('clients-show', $client) }}" class="">Show info</a></td>
                                <td><a href="{{ route('clients-edit', $client) }}" class="">Edit</a></td>
                            </tr>
                            @empty
                                <div class=" mt-4">
                                    <div class="client-line">No Clients yet</div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </table>
            </div>
        </div>
    </div>
</div>
  @endsection