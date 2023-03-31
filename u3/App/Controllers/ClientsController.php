<?php
namespace App\Controllers;
use App\App;
use App\DB\Json;
use App\Services\Auth;
use App\Services\Messages;

class ClientsController {

    public function __construct()
    {
        if (!Auth::get()->isAuth()) {
            App::redirect('login');
            die;
        }
    }
    public function index()
    {
        $clients = (new Json)->showAll();
        usort($clients, function($a, $b) {
            return strcmp($a['surname'], $b['surname']);
        });
        return App::views('clients/index', [
            'title' => 'Clients List',
            'clients' => $clients
        ]);
    }
    


    public function create()
    {
        return App::views('clients/create', [
            'title' => 'New Client'
        ]);
    }

    public function store()
{
    $data = [];
    $data['name'] = $_POST['name'];
    $data['surname'] = $_POST['surname'];
    $data['accNumber'] = 'LT 60 10100 ' . rand(00000000000,99999999999);
    $data['persId'] = $_POST['persId'];
    $data['balance'] = '0';

    $clients = (new Json)->showAll();

    $personalId = $_POST['persId'];
        if (!preg_match('/^\d{11}$/', $personalId)) {
            Messages::msg()->addMessage('Personal ID code is invalid', 'danger');
            return App::redirect('clients/create');
        }

    // Check if personalId already exists
    foreach ($clients as $client) {
        if ($client['persId'] == $data['persId']) {
            Messages::msg()->addMessage('Personal ID already exists', 'danger');
            return App::redirect('clients/create');
        }
    }

    (new Json)->create($data);
    Messages::msg()->addMessage('New client was created', 'success');
    return App::redirect('clients');
}


    public function show($id)
    {
        $client = (new Json)->show($id);

        return App::views('clients/show', [
            'title' => 'Client Page',
            'client' => $client
        ]);
    }

    public function editAdd($id)
    {
        $client = (new Json)->show($id);

        return App::views('clients/editAdd', [
            'title' => 'Edit Client',
            'client' => $client
        ]);
    }

    public function editMinus($id)
    {
        $client = (new Json)->show($id);

        return App::views('clients/editMinus', [
            'title' => 'Edit Client',
            'client' => $client
        ]);
    }

    public function update($id)
    {
        $client = (new Json)->show($id);
        $currentBalance = $client['balance'];
        $newBalancePlus = $currentBalance + $_POST['balance'];
        $data = [];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['accNumber'] = $client['accNumber'];
        $data['persId'] = $client['persId'];
        $data['balance'] = $newBalancePlus;
        (new Json)->update($id, $data); 
        Messages::msg()->addMessage('New funds was added to '. $_POST['name'] . ' ' . $_POST['surname'] .' account.', 'warning');
        return App::redirect('clients');
    }
    public function updateMinus($id)
    {
        $client = (new Json)->show($id);
        $currentBalance = $client['balance'];
        $newBalanceMinus = $currentBalance - $_POST['balance'];
        if ($_POST['balance'] > $currentBalance){
            Messages::msg()->addMessage('The amount you want to debit from '. $_POST['name'] . ' ' . $_POST['surname'] .' account is too large.', 'warning');
            return App::redirect('clients/editMinus/' . $client['id']);
        }
        $data = [];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['accNumber'] = $client['accNumber'];
        $data['persId'] = $client['persId'];
        $data['balance'] = $newBalanceMinus;
        (new Json)->update($id, $data); 
        Messages::msg()->addMessage('Funds was deducted from '. $_POST['name'] . ' ' . $_POST['surname'] .' account.', 'warning');
        return App::redirect('clients');
    }
    
    public function delete($id)
    {
        $client = (new Json)->show($id);
        if ($client['balance'] != 0) {
            Messages::msg()->addMessage('The client has a balance and cannot be deleted.', 'danger');
            return App::redirect('clients');
        }
        (new Json)->delete($id);
        Messages::msg()->addMessage('The client has been deleted.', 'warning');
        return App::redirect('clients');
    }

}