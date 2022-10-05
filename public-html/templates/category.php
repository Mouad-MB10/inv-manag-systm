    <!-- Modal -->
    <div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" role="alert">

                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-category" onsubmit="return false" method="POST">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="category-name" id="category-name">
                            <small id="cat-error" class="form-text text-muted"></small>
                        </div><br>
                        <div class="form-group">
                            <label>Parent Category</label>
                            <select name="parent-cat" id="parent-cat" class="form-control">
                            </select>
                            <small id="parent-error" class="form-text text-muted"></small>
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