<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // $totalClients = Client::count();
        //  View::share('totalClients', $totalClients);
    }

    public function index(Request $request)
    {
        $sort = $request->sort ?? '';
        // $filter = $request->filter ?? '';

        $clients = Client::query();
        $per = (int) ($request->per ?? 10);
        
        // $clients = match($filter){
        //     'default'=> 
        // }
        // if ($filter === 'balance') {
        //     $clients = $clients->where('balance', '>', 0);
        // } elseif ($filter === 'no-balance') {
        //     $clients = $clients->where('balance', '=', 0);
        // }

        $clients = match ($sort) {
            'name_asc' => Client::orderBy('name'),
            'name_desc' => Client::orderBy('name', 'desc'),
            'surname_asc' => Client::orderBy('surname'),
            'surname_desc' => Client::orderBy('surname', 'desc'),
            default => $clients
        };

        $clients = $clients->paginate($per)->withQueryString();
        // $clients = $clients->where('balance', '>', 0);
        // $clients = $clients->where('balance', '=', 0);
        
        // $clients = Client::orderByDesc('name')->get(); ---> duomenu bazes sortinimas
        // $clients = Client::all()->sortBy('name'); ---> php sort
        
        return view('clients.index', [
            'clients' => $clients,
            'sortSelect' => Client::SORT,
            'sort' => $sort,
            // 'filterSelect' => Client::FILTER,
            // 'filter' => $filter,
            'perSelect' => Client::PER,
            'per' => $per,
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
            'personId' => 'required|regex:/^(3[1-9]|4[0-9]|5[1-6]|6[1-6])\d{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])\d{3}[0-9X]$|unique:clients,personId',
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
        if ($request->balance > $client->balance) {
            return redirect()
                ->back()
                ->with('error','The amount to be withdrawn is greater than the balance on the account.');
        }
        $client->balance = $new_balance_minus;
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
            'personId' => 'required|regex:/^(3[1-9]|4[0-9]|5[1-6]|6[1-6])\d{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])\d{3}[0-9X]$|unique:clients,personId',
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
        if ($client->balance > 0) {
            return redirect()
                ->route('clients-index')
                ->with('error', 'Cannot delete client with balance.');
        }

        $client->delete();
        return redirect()
            ->route('clients-index')
            ->with('info', 'The client was deleted');
    }
}