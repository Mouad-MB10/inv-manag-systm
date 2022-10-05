    <!-- Modal -->
    <div class="modal fade" id="productEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edite Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-product-update" onsubmit="return false" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" name="idproduct" id="idproduct" value="">
                                <label for="inputEmail4">Date</label>
                                <input type="text" class="form-control" name="new-date" id="new-date"
                                    value="  <?php echo date('Y-m-d'); ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Product Name</label>
                                <input type="text" class="form-control" id="new-product" name="new-product" required>
                                <small class="form-text text-muted" id="product-error"></small>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="new-cat" id="new-cat" class="form-control" required></select>
                            <small class="form-text text-muted" id="cat-error"></small>
                        </div><br>
                        <div class="form-group">
                            <label>Brand</label>
                            <select name="new-brand" class="form-control" id="new-brand" required></select>
                            <small class="form-text text-muted" id="brnd-error"></small>
                        </div><br>

                        <div class="form-group col-md-12">
                            <label>Product Price</label>
                            <input type="text" class="form-control" name="new-price" id="new-price" required>

                            <small class="form-text text-muted" id="price-error"></small> <br>
                            <div class="form-group col-md-12">
                                <label>Quantity</label>

                                <input type="text" class="form-control" name="new-quantity" id="new-quantity" required>
                                <small class="form-text text-muted" id="stock-error"></small>
                                <br>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update Product</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>