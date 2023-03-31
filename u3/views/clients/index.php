    <div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Clients List</h4>
                    <div class="head-info-list">
                        <div>Name</div>
                        <div>Surname</div>
                        <div>Balance</div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <?php foreach ($clients as $client) : ?>
                                <tr>
                                    <td><?= $client['name'] ?></td>
                                    <td><?= $client['surname'] ?></td>
                                    <td><?= $client['balance'] ?> eur</td>
                                    <td class="list-btn">
                                        <a href="<?= URL ?>clients/show/<?= $client['id'] ?>" class="btn btn-info">Show</a>
                                        <form action="<?= URL ?>clients/delete/<?= $client['id'] ?>" method="post" style="display: inline-block;">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
