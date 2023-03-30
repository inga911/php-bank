<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Client</h1>
                    <div style="display: flex; justify-content: space-between">
                        <div>Vardas</div>
                        <div>Pavarde</div>
                        <div>Saskaitos numeris</div>
                        <div>A.k.</div>
                        <div>Balansas</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="client-line">
                        <div class="client-info" >
                            <?= $client['name'] ?>
                            <?= $client['surname'] ?>
                            <?= $client['accNumber'] ?>
                            <?= $client['persId'] ?>
                            <?= $client['balance'] ?>
                        </div>
                    </div>
                </div>
                <a href="<?= URL ?>clients/show/<?= $client['id'] ?>" class="btn btn-info">Deduct Funds</a>
                <a href="<?= URL ?>clients/edit/<?= $client['id'] ?>" class="btn btn-success">Add Funds</a>
            </div>
        </div>
    </div>
</div>