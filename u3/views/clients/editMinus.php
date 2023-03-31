<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Edit Client / Deduct Funds</h1>
                </div>
                <div class="card-body">
                    <form action="<?= URL ?>clients/editMinus/<?= $client['id'] ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $client['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client Surname</label>
                            <input type="text" class="form-control" name="surname" value="<?= $client['surname'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client account balance is <?= $client['balance'] ?></label>
                            <input type="text" class="form-control" name="balance">
                            <span style="color: grey; font-size: 12px">Enter an amount you want to deduct</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Deduct Funds</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>