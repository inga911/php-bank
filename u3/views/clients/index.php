<div class="container">
    <div class="row">
        <h2 class="card-header">Clients List</h2>
            <div class="card-body">
                    <ul class="list-group">
                        <?php foreach($clients as $client) : ?>
                        <li class="list-group-item">
                            <div class="client-line">
                                <div class="client-info">
                                    <?= $client['name'] ?>
                                    <?= $client['surname'] ?>
                                    <span><?= $client['tt'] ? 'TIK TOK' : 'FB' ?></span>
                                </div>
                                <div class="buttons">
                                <a href="<?= URL ?>clients/show/<?= $client['id'] ?>" class="btn btn-info">Show</a>
                                <a href="<?= URL ?>clients/edit/<?= $client['id'] ?>" class="btn btn-success">Edit</a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </ul>
            </div>
    </div>
</div>