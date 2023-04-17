<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
// use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $sort = $request->sort ?? '';

        $clients = Client::query();
        $per = (int) ($request->per ?? 10);

        $clients = match ($sort) {
            'name_asc' => Client::orderBy('name'),
            'name_desc' => Client::orderBy('name', 'desc'),
            'surname_asc' => Client::orderBy('surname'),
            'surname_desc' => Client::orderBy('surname', 'desc'),
            default => $clients
        };

        $clients = $clients->paginate($per)->withQueryString();
 
        // $clients = Client::orderByDesc('name')->get(); ---> duomenu bazes sortinimas
        // $clients = Client::all()->sortBy('name'); ---> php sort
        
        return view('clients.index', [
            'clients' => $clients,
            'sortSelect' => Client::SORT,
            'sort' => $sort,
            'perSelect' => Client::PER,
            'per' => $per,
        ]);
    }


    public function create(Client $client)
    {
        $towns = Town::all();
        $accNumb = 'LT 60 10100 ' . rand(10000000000, 99999999999);
        $client = $client;
        return view('clients.create', [
            'accNumb' => $accNumb, 
            'client' => $client, 
            'towns' => $towns
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
        $client->personId = $request->personId;
        $client->accNumb = 'LT 60 10100 ' . rand(10000000000, 99999999999);
        $client->balance = '0';
        $client->town_id = $request->town_id;
        $client->save();
        return redirect()
            ->route('clients-index')
            ->with('ok', 'New client was created');
        
    }


    public function show(Client $client, Town $towns)
    {
        $towns = Town::all();
        return view('clients.show', [
            'client' => $client,
            'towns' => $towns
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
        $towns = Town::all();
        return view('clients.editinfo', [
            'client' => $client,
            'towns' => $towns
        ]);
    }

    public function editminus(Client $client)
    {
        return view('clients.editminus', [
            'client' => $client
        ]);
    }
    public function edit(Order $order)
    {
        return view('orders.edit', [
            'order' => $order,
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'title'=> $request->title,
            'price'=> $request->price
        ]);
        return redirect()
        ->route('orders-index')
        ->with('light-up', $order->id)
        ;
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
            'personId' => 'nullable|numeric',
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


    public function destroy(Request $request, Client $client)
    {
        // if ($client->balance > 0) {
        //     return redirect()
        //         ->route('clients-index')
        //         ->with('error', 'Cannot delete client with balance.');
        // }

        if (!$request->confirm && $client->order->count()) {
            return redirect()
            ->back()
            ->with('delete-modal', [
                'This client has orders. Do you really want to delete?',
                $client->id
            ]);
        }
        
        
        $client->delete();
        return redirect()
        ->route('clients-index')
            ->with('info', 'The client was deleted');
    }
}