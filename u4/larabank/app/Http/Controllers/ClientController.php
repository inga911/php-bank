<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Validator;
// use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreClientRequest;
// use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            // 'personId' => 'required|min:11',
        ]);

        // $validator->after(function (Validator $validator) {
        //     $validator->errors()->add('Fancy', 'Fancy is wrong');
        // });

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        //    $client->personId = $request->personId;
        //    $client->accNumb = $request->accNumb;
        //    $client->balance = $request->balance;
        $client->save();
        return redirect()
                ->route('clients-index')
                ->with('ok', 'New client was created');
    }

    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client
        ]);
    }

    public function editadd(Client $client)
    {
        return view('clients.editadd', [
            'client' => $client
        ]);
    }

    public function editminus(Client $client)
    {
        return view('clients.editminus', [
            'client' => $client
        ]);
    }
    public function update(Request $request, Client $client)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            // 'personId' => 'required|min:11',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                        ->back()
                        ->withErrors($validator);
        }


        $client->name = $request->name;
        $client->surname = $request->surname;
        //    $client->personId = $request->personId;
        //    $client->accNumb = $request->accNumb;
        //    $client->balance = $request->balance;
        $client->save();
        return redirect()
                ->route('clients-index')
                ->with('ok', 'The client was updated');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()
                ->route('clients-index')
                ->with('info', 'The client was deleted');
    }
}
