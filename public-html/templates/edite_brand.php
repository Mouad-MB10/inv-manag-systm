<!-- Modal -->
<div class="modal fade" id="edit-brand" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" role="alert">

                </button>
            </div>
            <div class="modal-body">
                <form id="update-brand-form" onsubmit="return false">
                    <div class="form-group">
                        <input type="hidden" name="eid" id="id" value="">
                        <label>Brand Name</label>
                        <input type="text" class="form-control" name="update-brand" id="update-brand" value="">
                        <small id="brand-error" class="form-text text-muted"></small>
                    </div><br>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>