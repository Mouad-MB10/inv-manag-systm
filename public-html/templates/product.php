    <!-- Modal -->
    <div class="modal fade" id="product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-product" onsubmit="return false" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Date</label>
                                <input type="text" class="form-control" name="date-added" id="date-added"
                                    value="  <?php echo date('Y-m-d'); ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Product Name</label>
                                <input type="text" class="form-control" id="product-name" name="product-name" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="select-cat" id="select-cat" class="form-control" required></select>
                        </div><br>
                        <div class="form-group">
                            <label>Brand</label>
                            <select name="select-brand" class="form-control" id="select-brand" required></select>
                        </div><br>

                        <div class="form-group col-md-12">
                            <label>Product Price</label>
                            <input type="text" class="form-control" name="product-price" id="product-price" required>
                            <br>
                            <div class="form-group col-md-12">
                                <label>Quantity</label>

                                <input type="text" class="form-control" name="product-quantity" id="product-quantity"
                                    required><br>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Add Product</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>