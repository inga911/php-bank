<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Client</h1>
                    <div class="head-info">
                        <div>Name</div>
                        <div>Surname</div>
                        <div>Account number</div>
                        <div>Personal ID</div>
                        <div>Balance</div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="client-info-show" >
                            <div><?= $client['name'] ?></div>
                            <div><?= $client['surname'] ?></div>
                            <div><?= $client['accNumber'] ?></div>
                            <div><?= $client['persId'] ?></div>
                            <div><?= $client['balance'] ?> eur</div>
                        </div>
                </div>
                <div class="show-buttons">
                    <a href="<?= URL ?>clients/editMinus/<?= $client['id'] ?>" class="btn btn-warning">Deduct Funds</a>
                    <a href="<?= URL ?>clients/editAdd/<?= $client['id'] ?>" class="btn btn-success">Add Funds</a>
                </div>
            </div>
        </div>
    </div>
</div>