<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create(Request $request, Account $account)
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

        $accountNumber = 'LT'.  rand(10,99) .  rand(10,99) . rand(100,999)  . rand(10000000000, 99999999999);

        $account = new Account;
        $account->client_id = $request->input('client_id');
        $account->account = $accountNumber;
        $account->save();

        return redirect()
            ->route('clients-index', [
                'client' => $request->input('client_id')
            ])
            ->with('ok', 'Bank account number generated successfully!');
    }


    public function show(Account $accounts, Client $client)
    {
        $accounts = $client->accounts; 
        return view('account.show', [
            'client' => $client,
            'accounts' => $accounts
        ]);
    }


    public function add(Client $client, Account $account)
    {
        return view('account.add', compact('client', 'account'));
    }



    public function updateAdd(Request $request, Client $client, Account $account)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $account->balance += $validatedData['amount'];
        $account->save();

        return redirect()->route('account-show', [$client, $account])
            ->with('ok', 'Funds added successfully to ' . $client->name . ' ' . $client->surname . ' ' . $account->account);
    }

    public function deduct(Client $client, Account $account)
    {
        return view('account.deduct', compact('client', 'account'));
    }


    public function updateDeduct(Request $request, Client $client, Account $account)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);
        
        if($validatedData['amount'] > $account->balance){
            return redirect()
                    ->back()
                    ->with('error', 'Not enough money to deduct this amount.');

        }

        $account->balance -= $validatedData['amount'];
        $account->save();

        return redirect()->route('account-show', [$client, $account])
            ->with('ok', 'Funds deducted successfully from ' . $client->name . ' ' . $client->surname . ' ' . $account->account);
    }
    public function transfer(Client $client)
    {
        // $clients = Client::all();
        // $accounts = $client->accounts; 
        // return view('account.transfer', compact('client', 'accounts', 'clients'));
    }


    public function destroy(Request $request, Client $client, Account $account)
    {
        if ($account->balance > 0) {
            return redirect()
                    ->route('account-show', $client)
                    ->with('error', 'Cannot delete account with balance.');
        }

        $account->delete();

        return redirect()
                ->route('account-show', $client)
                ->with('ok', 'Account deleted successfully');
    }

        
        
        
}