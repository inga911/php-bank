@extends('layouts.app')

@section('content')
<h2 class="main-title">Clients List</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
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
                                    <td><a href="" class="">Show acc</a></td>
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