<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Edit Client / Add Funds</h1>
                </div>
                <div class="card-body">
                    <form action="<?= URL ?>clients/editAdd/<?= $client['id'] ?>" method="post">
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
                            <span style="color: grey; font-size: 12px">Enter an amount you want to add</span>
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Bank Account Number</label>
                            <input type="text" class="form-control" name="bank_account_number" value="<?= $client['bank_account_number'] ?>" readonly>
                            <div class="form-text">This number cannot be changed.</div>
                        </div> -->
                        <button type="submit" class="btn btn-primary">Add Funds</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>