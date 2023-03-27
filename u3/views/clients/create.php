<div class="container">
    <div class="row">
        <h2 class="card-header">Create Account</h2>
            <div class="card-body">
                <form action="<?= URL ?>clients/create" method="post">
                    <div class="add-info">
                        <label class="form-label">Client Name</label>
                        <input type="text" class="form-control" name="name">
                        <div class="form-text">Please add client name here</div>
                    </div>
                    <div class="add-info">
                        <label class="form-label">Client Surname</label>
                        <input type="text" class="form-control" name="surname">
                        <div class="form-text">Please add client surname here</div>
                    </div>
                    <div>
                        <input type="checkbox" class="form-check-input" id="tt" name="tt">
                        <label class="form-check-label" for="tt">Has TikTok account</label>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>