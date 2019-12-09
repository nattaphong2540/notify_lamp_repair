<div class="row" id="showProduct">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="card-title">All Products</h4>
                    </div>
                    <div class="col-lg-2">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newProductModal">Add Product</button>
                        </div>
                        <div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newProductModalLabel">Add Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" action="<?= site_url("/product/new_product_form") ?>" method="POST" id="addProductForm">
                                            <div class="form-group row">
                                                <label for="product_name" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="product_name" placeholder="input name" name="product_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="product_price" class="col-sm-3 col-form-label">Price</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="product_price" placeholder="input price" name="product_price">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="product_amount" class="col-sm-3 col-form-label">Amount</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="product_amount" placeholder="input amount" name="product_amount">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="submitButton" onclick="submit_product()">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- start modal edit form     -->
                        <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" action="<?= site_url("/product/edit_product_form") ?>" method="POST" id="editProductForm">
                                            <div class="form-group row">
                                                <label for="product_name" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="hidden" class="form-control" id="edit_product_id" name="product_name">
                                                    <input type="text" class="form-control" id="edit_product_name" name="product_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="product_price" class="col-sm-3 col-form-label">Price</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="edit_product_price" name="product_price">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="product_amount" class="col-sm-3 col-form-label">Amount</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="edit_product_amount" name="product_amount">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="editButton" onclick="update_product()">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal edit form     -->

                    </div>
                </div>
                <p class="card-description">
                    show all products in table product
                </p>
                <div class="table-responsive">
                    <table class="table" id="products-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>name</th>
                                <th>price</th>
                                <th>amount</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($products as $index => $product) {
                                ?>
                                <tr>
                                    <td><?= ++$index ?></td>
                                    <td><?= $product->name ?></td>
                                    <td><?= $product->price ?></td>
                                    <td><?= $product->amount ?></td>
                                    <td><button type="button" class="btn btn-warning" id="editButton" data-toggle="modal" data-target="#editProductModal" onclick="edit_product(<?= $product->id ?>)">Edit</button></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function edit_product(p_id) {
        var product_id = {
            p_id: p_id
        }

        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/product/show_product_editForm") ?>",
            data: product_id,
            dataType: "text",
            success: function(resultData) {
                productDetail = JSON.parse(resultData);
                var product_id = $("#edit_product_id").val(productDetail.id);
                var product_name = $("#edit_product_name").val(productDetail.name);
                var product_price = $("#edit_product_price").val(productDetail.price);
                var product_amount = $("#edit_product_amount").val(productDetail.amount);
            }
        })
    }

    function update_product() {
        var product_id = $("#edit_product_id").val();
        var product_name = $("#edit_product_name").val();
        var product_price = $("#edit_product_price").val();
        var product_amount = $("#edit_product_amount").val();

        var editProductDatas = {
            product_id: product_id,
            product_name: product_name,
            product_price: product_price,
            product_amount: product_amount
        };

        var saveData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/product/edit_product_form") ?>",
            data: editProductDatas,
            dataType: "text",
            success: function(resultData) {
                alert("Inserted");
                $('#newProductModal').modal('hide')
                location.reload();

            }
        })
    }

    function submit_product() {
        var product_name = $("#product_name").val();
        var product_price = $("#product_price").val();
        var product_amount = $("#product_amount").val();

        var productDatas = {
            product_name: product_name,
            product_price: product_price,
            product_amount: product_amount
        };

        var saveData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/product/new_product_form") ?>",
            data: productDatas,
            dataType: "text",
            success: function(resultData) {
                alert("Inserted");
                $('#newProductModal').modal('hide')
                $('#product_name').val('');
                $('#product_price').val('');
                $('#product_amount').val('');
                location.reload();

            }
        })
    }
    $(document).ready(function() {
        $('#products-table').DataTable();
    });
</script>