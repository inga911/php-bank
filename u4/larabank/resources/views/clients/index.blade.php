@extends('layouts.app')

@section('content')
<h2 class="main-title">Clients List</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            {{-- <div class="mt-4 pages">
                {{ $clients->links() }}
            </div> --}}
            <div class="card mt-5">
                <div>
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
                </div>
                <div class="card-header">
                    <div class="head-info-list">
                        <div>Surname</div>
                        <div>Name</div>
                        <div>Balance</div>
                        <div>
                            <form action="{{ route('clients-index') }}" method="get">
                                <select name="sort">
                                    @foreach ($sortSelect as $value => $text)
                                        <option value="{{ $value }}" @if($value === $sort) selected @endif>{{ $text }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="sort-btn">OK</button>
                            </form>
                        </div>
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
                                        <form action="{{ route('clients-delete', $client) }}" method="post" style="display: inline-block;">
                                            <a href="{{ route('clients-show', $client) }}" class="btn btn-show">Show</a>
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
            <div class="mt-4 pages">
            {{ $clients->links() }}
            </div>
        </div>
    </div>
</div>
@endsection