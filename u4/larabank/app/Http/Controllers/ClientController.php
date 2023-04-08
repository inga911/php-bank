<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
        $clients = Client::orderBy('surname')->get();
        return view('clients.index', [
            'clients' => $clients
        ]);
    }

    public function create(Client $client)
    {
        $accNumb = 'LT 60 10100 ' . rand(10000000000, 99999999999);
        $client = $client;
        return view('clients.create', ['accNumb' => $accNumb, 'client' => $client]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'personId' => 'required|numeric|min_digits:11|max_digits:11',
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
        $client->personId = $request->personId;
        $client->accNumb = 'LT 60 10100 ' . rand(10000000000, 99999999999);
        $client->balance = '0';
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

    public function editinfo(Client $client)
    {
        return view('clients.editinfo', [
            'client' => $client
        ]);
    }

    public function editminus(Client $client)
    {
        return view('clients.editminus', [
            'client' => $client
        ]);
    }

    public function updateadd(Request $request, Client $client)
    {
       
        $new_balance_add = $client->balance + $request->balance;
        $client->balance = $new_balance_add;
        $client->save();
        return redirect()
            ->route('clients-index')
            ->with('ok', 'The funds was added successfully!');
    }

    public function updateminus(Request $request, Client $client)
    {
        $new_balance_minus = $client->balance - $request->balance;
        $client->balance = $new_balance_minus;
        // if ($request->has('editminus')) {
        //     if ($request->balance > $client->balance) {
        //         return redirect()
        //             ->back()
        //             ->with('error','The amount to be withdrawn is greater than the balance on the account.');
        //     }
        // }
        $client->save();
        return redirect()
            ->route('clients-index')
            ->with('ok', 'The funds was deducted successfully');
    }

    public function updateinfo(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|min:3',
            'surname' => 'nullable|min:3',
            'personId' => 'nullable|numeric|min_digits:11|max_digits:11',
            'accNumb' => 'nullable|min:22',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->personId = $request->personId;
        $client->accNumb = $request->accNumb;
        $client->save();
        return redirect()
            ->route('clients-index')
            ->with('ok', 'The client info was updated successfully');
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()
            ->route('clients-index')
            ->with('info', 'The client was deleted');
    }
}