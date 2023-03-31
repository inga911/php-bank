<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Create Client Account</h1>
                </div>
                <div class="card-body">
                    <form action="<?= URL ?>clients/create" method="post">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control" name="surname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Personal ID number</label>
                            <input type="text" class="form-control" name="persId">
                            <div class="form-text">Personal ID number must contain 11 numbers</div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">*Bank Account Number will be generated automatically.</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>