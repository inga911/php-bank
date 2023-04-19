<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Client;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index(Client $client)
    {
        $totalClients = Client::all()->count();
        $totalAccounts = Account::all()->count();
        $totalAmount = Account::sum('balance');
        $richestClient = Client::with('accounts')
                                ->get()
                                ->sortByDesc(function ($client) {
                                return $client->accounts->sum('balance');
                                })->first();
        $averageAmount = Account::avg('balance');
        $accountsZero = Account::where('balance', 0)->count();
        $accountsNegative = Account::where('balance', '<', 0)->count();
        return view('home', [
            'totalClients' => $totalClients,
            'totalAccounts' => $totalAccounts,
            'totalAmount' => $totalAmount,
            'richestClient' => $richestClient,
            'averageAmount' => $averageAmount,
            'accountsZero' => $accountsZero,
            'accountsNegative' => $accountsNegative,
        ]);
    }
}
