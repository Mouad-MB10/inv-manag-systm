    <!-- Modal -->
    <div class="modal fade" id="brand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" role="alert">

                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-brand" onsubmit="return false" method="POST">
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" name="brand-name" class="form-control" id="brand-name"><br>
                            <small class="form-text text-muted" id="brand-error"></small>
                        </div><br>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>