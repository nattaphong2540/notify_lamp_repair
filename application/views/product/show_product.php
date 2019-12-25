<div class="row" id="showProduct">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="card-title">All Product2</h4>
                    </div>
                    <div class="col-lg-2">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" onclick="new_product()">Add Product</button>
                        </div>

                        <!-- start modal add & edit form -->
                        <div class="modal fade" id="ProductModal" tabindex="-1" role="dialog" aria-labelledby="ProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ProductModalLabel">Add Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="POST" action="<?= site_url("/product/product_form") ?>" id="ProductForm">
                                            <fieldset>
                                                <div class="form-group row">
                                                    <label for="product_name" class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="hidden" class="form-control" id="product_id" name="id">
                                                        <input type="text" class="form-control" id="product_name" placeholder="input name" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="product_price" class="col-sm-3 col-form-label">Price</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="product_price" placeholder="input price" name="price">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="product_amount" class="col-sm-3 col-form-label">Amount</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="product_amount" placeholder="input amount" name="amount">
                                                    </div>
                                                </div>
                                                <input id="submit_type" name="submit_type" hidden>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" id="submitButton" form="ProductForm">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal add & edit form -->

                        <!-- start modal delete form     -->
                        <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel-2" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteProductModalLabel-2">Delete Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>You want to dalete data of product</p>
                                        <p>ID: <output type="number" id="delete_product_id" name="id"></p>
                                        <p>Name: <output type="text" id="delete_product_name" name="name"></p>
                                        <p>Price: <output type="number" id="delete_product_price" name="price"></p>
                                        <p>Amount: <output type="number" id="delete_product_amount" name="amount"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="submitDelete_product" onclick="submitDelete_product()">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal delete form     -->

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
                                <th>action edit</th>
                                <th>action delete</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#products-table').DataTable({
            "ajax": {
                "url": "<?php echo site_url("product/get_all_products") ?>",
                "dataSrc": "data",
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": "price"
                },
                {
                    "data": "amount"
                },
            ],
            "columnDefs": [{
                    "targets": 4,
                    "data": "id",
                    "render": function(data, type, row, meta) {
                        editButton = `<button type="button" class="btn btn-warning" id="editButton" data-toggle="modal" data-target="#ProductModal" onclick="edit_product(${data})">Edit</button>`
                        return editButton;
                    },
                },
                {
                    "targets": 5,
                    "data": "id",
                    "render": function(data, type, row, meta) {
                        deleteButton = `<button type="button" class="btn btn-danger" id="deleteButton" data-toggle="modal" data-target="#deleteProductModal" onclick="delete_product(${data})">Delete</button>`
                        return deleteButton;
                    },
                }
            ]
        });
    });

    function submitDelete_product() {
        var product_id = $("#delete_product_id").val();
        var deleteProductDatas = {
            product_id: product_id,
        };
        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/product/delete_product_form") ?>",
            data: deleteProductDatas,
            dataType: "text",
            success: function(resultData) {
                $('#deleteProductModal').modal('hide')
                location.reload();
            }
        })
    }

    function delete_product(id) {
        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/product/show_product_editForm") ?>",
            data: {
                id
            },
            dataType: "json",
            success: function(data) {
                $("#delete_product_id").val(data['id']);
                $("#delete_product_name").val(data['name']);
                $("#delete_product_price").val(data['price']);
                $("#delete_product_amount").val(data['amount']);
            }
        });
    }

    function new_product() {
        $('#ProductForm').trigger('reset');
        $('#submit_type').val("new");
        $('#ProductModal').modal('show');
    }

    function edit_product(id) { //show data of current product before update
        $('#ProductForm').trigger('reset');
        var showData = $.ajax({
            type: 'POST',
            url: "<?= site_url("/product/show_product_editForm") ?>",
            data: {
                id
            },
            dataType: "json",
            success: function(data) {
                $("#product_name").val(data['name']);
                $("#product_price").val(data['price']);
                $("#product_amount").val(data['amount']);
            }
        });
        $('#submit_type').val(id);
        $('#ProductModal').modal('show');
    }
</script>