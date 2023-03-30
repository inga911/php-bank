<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Add Funds</h1>
                </div>
                <div class="card-body">
                    <form action="<?= URL ?>clients/addFunds/<?= $client['id'] ?>" method="get">
                        <div class="mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" value="<?= $client['name'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client Surname</label>
                            <input type="text" class="form-control" value="<?= $client['surname'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Current Balance</label>
                            <input type="number" class="form-control" value="<?= $client['likutis'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount to Add</label>
                            <input type="number" class="form-control" name="amount">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
