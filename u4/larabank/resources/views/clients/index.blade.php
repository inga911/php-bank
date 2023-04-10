@extends('layouts.app')

@section('content')
<h2 class="main-title">Clients List</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="head-info-list">
                        <div>Surname</div>
                        <div>Name</div>
                        <div>Balance</div>
                        <form action=""></form>
                        <form action=""></form>
                        <form action="{{ route('clients-index') }}" method="GET">
                            <select name="sort_by">
                                <option value="surname" {{ request('sort_by') == 'surname' ? 'selected' : '' }}>Surname</option>
                                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                            </select>
                            <button type="submit" class="sort-btn">Sort</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @forelse($clients as $client)
                                <tr class="list">
                                    <td>{{ $client->surname }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client['balance'] }} eur</td>
                                    <td class="list-btn">
                                        <a href="{{ route('clients-show', $client) }}" class="btn btn-show">Show</a>
                                        <form action="{{ route('clients-delete', $client) }}" method="post" style="display: inline-block;">
                                            <button type="submit" class="btn btn-del">Delete</button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <div class=" mt-4">
                                <div class="client-line">No Clients yet</div>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection