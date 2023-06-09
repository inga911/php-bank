<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="title">Deduct Funds</h4>
                </div>
                <div class="card-body">
                    <form action="<?= URL ?>clients/editMinus/<?= $client['id'] ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $client['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control" name="surname" value="<?= $client['surname'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter an amount you want to deduct</label>
                            <input type="text" class="form-control" name="balance">
                            <span style="color: grey; font-size: 12px">Remaining funds: <?= $client['balance'] ?> eur</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-deduct">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>