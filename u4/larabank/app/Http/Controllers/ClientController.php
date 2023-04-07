<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreClientRequest;
// use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::All()->sortBy('surname');
        return view('clients.index', [
            'clients' => $clients
        ]);

    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
       $client = new Client;
       $client->name = $request->name;
       $client->surname = $request->surname;
    //    $client->personId = $request->personId;
    //    $client->accNumb = $request->accNumb;
    //    $client->balance = $request->balance;
        $client->save();
        return redirect()->route('clients-index');
    }

    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client
        ]);
    }

    public function edit(Client $client)
    {
        //
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }
}
