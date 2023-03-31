<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Clients List</h1>
                    <div class="head-info-list">
                        <div>Name</div>
                        <div class="surn">Surname</div>
                        <div>Balance</div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($clients as $client) : ?>
                                <li class="list-group-item">
                                    <div class="client-line">
                                        <div class="client-info">
                                            <div class="head-info-list">
                                                <div><?= $client['name'] ?></div>
                                                <div><?= $client['surname'] ?></div>
                                                <div><?= $client['balance'] ?></div>
                                            </div>

                                            <div class="buttons-div">
                                                <a href="<?= URL ?>clients/show/<?= $client['id'] ?>" class="buttons btn btn-info">Show</a>
                                                <form action="<?= URL ?>clients/delete/<?= $client['id'] ?>" method="post">
                                                    <button type="submit" class="buttons btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>