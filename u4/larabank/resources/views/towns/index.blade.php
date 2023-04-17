@extends('layouts.app')

@section('content')
<h2 class="main-title">Towns List</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="head-info-list">
                        <div>Name</div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @forelse($towns as $town)
                                <tr class="list">
                                    <td>{{ $town->name }}
                                        <div class="clients-count">clients: [{{$town->client->count()}}]</div>
                                        <div class="clients-count">orders: [{{$town->ordersCount}}]</div>
                                    </td>
                                    <td>
                                        <form action="{{ route('towns-delete', $town) }}" method="post" style="display: inline-block;">
                                            <a href="{{ route('towns-show', $town) }}" class="btn btn-show">Show</a>
                                            <a href="{{ route('towns-edit', $town) }}" class="btn btn-show">Edit</a>
                                            <button type="submit" class="btn btn-del">Delete</button>
                                            
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <div class=" mt-4">
                                <div class="client-line">No towns yet</div>
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