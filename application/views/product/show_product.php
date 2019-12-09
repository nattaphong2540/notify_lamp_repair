<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="card-title">All Products</h4>
                    </div>
                    <div class="col-lg-2">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add Product</button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
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
                                        <button type="button" class="btn btn-success" id="submitButton">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($products as $index => $product) { ?>
                                <tr>
                                    <td><?= ++$index ?></td>
                                    <td><?= $product->name ?></td>
                                    <td><?= $product->price ?></td>
                                    <td><?= $product->amount ?></td>
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
    $("#submitButton").click(function() {
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
            }
        })
    });
    $(document).ready(function() {
        $('#products-table').DataTable();
    });
</script>