<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::all()->sortBy('surname');

        return view('clients.index', [
            'clients' => $clients
        ]);
    }

    public function create()
    {
        return view('clients.create', [
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'personId' => 'nullable|numeric|min_digits:11|max_digits:11',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->persId = $request->persId;
        $client->save();
        return redirect()
            ->route('clients-index');
    }

   

    public function show(Client $client)
    {
       
        return view('clients.show', [
            'client' => $client
        ]);
    }

    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }


    public function update(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|min:3',
            'surname' => 'nullable|min:3',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->save();
        return redirect()
            ->route('clients-index')
            ->with('ok', 'The client was updated successfully');
    }

    public function destroy(Client $client)
    {
        //
    }
}
