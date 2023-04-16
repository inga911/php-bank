<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $clients = Client::all();
        return view('account.create', [
            'clients' => $clients
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|exists:clients,id'
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $accountNumber = 'LT1010060' . rand(10000000, 99999999);

        $account = new Account;
        $account->client_id = $request->input('client_id');
        $account->account = $accountNumber;
        $account->save();

        return redirect()
            ->route('clients-index', [
                'client' => $request->input('client_id')
            ])
            ->with('success', 'Bank account number generated successfully!');
    }

    public function show(Account $accounts, Client $client)
    {
        $accounts = $client->accounts; 
        return view('account.show', compact('client', 'accounts'));
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
