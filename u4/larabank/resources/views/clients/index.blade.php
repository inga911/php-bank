@extends('layouts.app')

@section('content')
<h2 class="main-title">Clients List</h2>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    
                    <div class="head-info-list">
                        <div>Surname</div>
                        <div>Name</div>
                        <div>Balance</div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->surname }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->balance }} eur</td>
                                    <td class="list-btn">
                                        <a href="{{ route('clients-show', $client) }}" class="btn btn-info btn-show">Show</a>
                                        <form action="" method="post" style="display: inline-block;">
                                            <button type="submit" class="btn btn-danger btn-del">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection